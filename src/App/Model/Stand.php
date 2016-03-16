<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

namespace App\Model;

/**
 * Description of Stand
 *
 * @author stefan
 */
class Stand implements \JsonSerializable
{

    private $id;
    private $size;
    private $name;
    private $isReserved;
    private $userId;
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIsReserved()
    {
        return $this->isReserved;
    }

    /**
     *
     * @return \App\Security\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setIsReserved($isReserved)
    {
        $this->isReserved = $isReserved;
        return $this;
    }

    public function setUser(\App\Security\User $user)
    {
        $this->user = $user;
        $this->userId = $user->getId();

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function isReserved()
    {
        return (bool) $this->isReserved;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}