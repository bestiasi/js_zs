<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */
/* @var $app App\Silex\Application */
$app->register(new Silex\Provider\SecurityServiceProvider(),
        array(
    'security.firewalls' => array(
        'login' => array(
            'pattern' => '^/login$',
        ),
        'secured_area' => array(
            'pattern' => '^.*$',
            'anonymous' => false,
            'form' => array(
                'login_path' => '/login',
                'check_path' => '/login_check',
            ),
            'logout' => array(
                'logout_path' => '/logout',
            ),
            'users' => $app->share(function($app) {

                return $app['user.manager'];
            }),
        ),
    )
));

$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider());

$userServiceProvider = new SimpleUser\UserServiceProvider();
$app->register($userServiceProvider);


// Mount SimpleUser routes.
$app->mount('/', $userServiceProvider);
