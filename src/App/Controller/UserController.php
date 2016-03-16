<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of UserController
 *
 * @author stefan
 */
class UserController extends \SimpleUser\UserController
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    public function __construct(\SimpleUser\UserManager $userManager, \Doctrine\DBAL\Connection $db, \Twig_Environment $twig,
            LoggerInterface $logger)
    {
        $this->twig = $twig;
        $this->logger = $logger;
        $this->db = $db;
        parent::__construct($userManager);
    }

    /**
     * Add account action.
     *
     * @param Application $app
     * @param Request $request
     * @return Response
     */
    public function addAccountAction(\Aptoma\Silex\Application $app, Request $request)
    {
        if ($request->isMethod('POST')) {
            try {
                $user = $this->createUserFromRequest($request);
                if ($error = $this->userManager->validatePasswordStrength($user, $request->request->get('password'))) {
                    throw new InvalidArgumentException($error);
                }

                $this->userManager->insert($user);

                $app['session']->getFlashBag()->set('alert', 'Account created.');

                // Redirect to user's new profile page.
                return $app->redirect($app['url_generator']->generate('user.view', array('id' => $user->getId())));
            } catch (InvalidArgumentException $e) {
                $error = $e->getMessage();
            }
        }

        return $app['twig']->render('User\add_account.html.twig',
                        array(
                    'error' => isset($error) ? $error : null,
                    'name' => $request->request->get('name'),
                    'email' => $request->request->get('email'),
        ));
    }

}