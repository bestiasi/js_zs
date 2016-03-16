<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

namespace App\Controller;

use App\Model\StandManager;
use App\Security\User;
use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment;

/**
 * Description of Standuri
 *
 * @author stefan
 */
class StandsController
{

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     *
     * @var Connection
     */
    private $db;

    /**
     *
     * @var StandManager
     */
    private $standManager;

    /**
     *
     * @var User
     */
    private $user;

    public function __construct(Connection $db, Twig_Environment $twig, LoggerInterface $logger, StandManager $standManager, User $user)
    {
        $this->twig = $twig;
        $this->logger = $logger;
        $this->db = $db;
        $this->standManager = $standManager;
        $this->user = $user;
    }

    public function indexAction(Request $request)
    {
        $reservedStands = $this->standManager->findBy(array('is_reserved' => 1));
        $stands = $this->standManager->findAll();

        if (!$stands) {

            return new Response('No stands were found!', 404);
        }

        $currentUserStand = $this->standManager->findOneBy(array('user_id' => $this->user->getId()));

        return $this->twig->render('Stands\index.html.twig',
                        array(
                    'stands' => $stands,
                    'currentUserStand' => $currentUserStand,
                    'reservedStands' => $reservedStands
        ));
    }

    public function reserveAction(Request $request)
    {
        $chosenStand = $request->request->get('stand');

        if (!$chosenStand) {
            return new JsonResponse(array('message' => 'You must select a stand!'), 400);
        }

        $stand = $this->standManager->findByName($chosenStand);

        if (!$stand) {
            return new JsonResponse(array('message' => 'We could not find the stand you selected!'), 400);
        }

        $valid = $this->standManager->validateReservation($stand);

        if (true !== $valid) {
            return new JsonResponse(array('message' => $valid['error']), 400);
        }

        $this->standManager->reserveStand($stand);

        $response = new JsonResponse();
        $response->setData(array($chosenStand));
        return $response;
    }

}