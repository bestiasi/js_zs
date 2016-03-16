<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

namespace App\Model;

use App\Security\User;
use Doctrine\DBAL\Connection;
use SimpleUser\UserManager;

/**
 * Description of StandManager
 *
 * @author stefan
 */
class StandManager
{

    /**
     *
     * @var Connection
     */
    private $db;

    /**
     *
     * @var UserManager
     */
    private $userManager;
    private $identityMap = array();
    private $tableName = 'stand';

    /**
     *
     * @var User
     */
    private $user;

    public function __construct(Connection $db, UserManager $userManager, User $user)
    {
        $this->db = $db;
        $this->userManager = $userManager;
        $this->user = $user;
    }

    /**
     *
     * @param string $name
     * @return Stand
     */
    public function findByName($name)
    {
        $stand = $this->findOneBy(array('name' => $name));

        return $stand;
    }

    /**
     * Get a single Stand instance that matches the given criteria. If more than one Stand matches, the first result is returned.
     *
     * @param array $criteria
     * @return Stand|null
     */
    public function findOneBy(array $criteria)
    {
        $stands = $this->findBy($criteria);

        if (empty($stands)) {
            return null;
        }

        return reset($stands);
    }

    /**
     *
     * @param mixed $standData
     * @return Stand
     */
    public function hydrateStand($standData)
    {
        $stand = new Stand();

        $stand->setId($standData['id']);
        $stand->setName($standData['name']);
        $stand->setSize($standData['size']);
        $stand->setIsReserved($standData['is_reserved']);

        if ($standData['user_id']) {

            $user = $this->userManager->findOneBy(array('id' => $standData['user_id']));

            $stand->setUserId($user->getId());
            $stand->setUser($user);
        }

        return $stand;
    }

    public function findAll()
    {
        return $this->findBy();
    }

    /**
     * Find Stand instances that match the given criteria.
     *
     * @param array $criteria
     * @param array $options An array of the following options (all optional):<pre>
     *      limit (int|array) The maximum number of results to return, or an array of (offset, limit).
     *      order_by (string|array) The name of the column to order by, or an array of column name and direction, ex. array(time_created, DESC)
     * </pre>
     * @return Stand[] An array of matching Stand instances, or an empty array if no matching stands were found.
     */
    public function findBy(array $criteria = array(), array $options = array())
    {
        // Check the identity map first.
        if (array_key_exists('id', $criteria) && array_key_exists($criteria['id'], $this->identityMap)) {
            return array($this->identityMap[$criteria['id']]);
        }

        list ($common_sql, $params) = $this->createCommonFindSql($criteria);

        $sql = 'SELECT * ' . $common_sql;

        if (array_key_exists('order_by', $options)) {
            list ($order_by, $order_dir) = is_array($options['order_by']) ? $options['order_by'] : array($options['order_by']);
            $sql .= 'ORDER BY ' . $this->db->quoteIdentifier($order_by) . ' ' . ($order_dir == 'DESC' ? 'DESC' : 'ASC') . ' ';
        }
        if (array_key_exists('limit', $options)) {
            list ($offset, $limit) = is_array($options['limit']) ? $options['limit'] : array(0, $options['limit']);
            $sql .= ' LIMIT ' . (int) $limit . ' ' . ' OFFSET ' . (int) $offset;
        }

        $data = $this->db->fetchAll($sql, $params);

        $stands = array();
        foreach ($data as $standData) {
            if (array_key_exists($standData['id'], $this->identityMap)) {
                $stand = $this->identityMap[$standData['id']];
            } else {
                $stand = $this->hydrateStand($standData);
                $this->identityMap[$stand->getId()] = $stand;
            }
            $stands[] = $stand;
        }

        return $stands;
    }

    /**
     * Get SQL query fragment common to both find and count querires.
     *
     * @param array $criteria
     * @return array An array of SQL and query parameters, in the form array($sql, $params)
     */
    protected function createCommonFindSql(array $criteria = array())
    {
        $params = array();

        $sql = 'FROM ' . $this->tableName . ' ';

        $first_crit = true;
        foreach ($criteria as $key => $val) {

            $sql .= ($first_crit ? 'WHERE' : 'AND') . ' ' . $key . ' = :' . $key . ' ';
            $params[$key] = $val;

            $first_crit = false;
        }

        return array($sql, $params);
    }

    /**
     *  dimensiune stand sa fie egala cu dimensiune contract
     *   sa nu aiba deja stand rezervat
     *   standul sa fie liber
     * @param Stand $stand
     * @return boolean
     */
    public function validateReservation(Stand $stand)
    {
        if ($stand->isReserved()) {
            return array('error' => 'This is stand is already reserved!');
        }

        if ($stand->getSize() != $this->user->getStandSize()) {
            return array('error' => 'You must choose a stand of size ' . $this->user->getStandSize() . 'x2 !');
        }

        $existingStand = $this->findBy(array('user_id' => $this->user->getId()));
        if ($existingStand) {
            return array('error' => 'You already reserved a stand!');
        }

        return true;
    }

    public function reserveStand(Stand $stand)
    {
        $stand->setUser($this->user);
        $stand->setIsReserved(true);

        $this->update($stand);
    }

    /**
     * Update data in the database for an existing user.
     *
     * @param Stand $stand
     */
    public function update(Stand $stand)
    {
        $sql = 'UPDATE ' . $this->db->quoteIdentifier($this->tableName) . '
            SET name = :name
            , size = :size
            , user_id = :user
            , is_reserved = :isReserved
            WHERE id = :id';

        $params = array(
            'id' => $stand->getId(),
            'name' => $stand->getName(),
            'size' => $stand->getSize(),
            'user' => $stand->getUser()->getId(),
            'isReserved' => $stand->getIsReserved(),
        );

        $this->db->executeUpdate($sql, $params);
    }

}