<?php

$startTime = microtime(true);
require_once __DIR__ . '/../vendor/autoload.php';

// This is the default config. See `deploy_config/README.md' for more info.
$config = array(
    'timer.start' => $startTime,
    'monolog.name' => 'silex-bootstrap',
    'monolog.level' => \Monolog\Logger::DEBUG,
    'monolog.logfile' => __DIR__ . '/log/app.log',
    'debug'=>true
);

// Initialize Application
$app = new App\Silex\Application($config);

//// Apply custom config if available
if (file_exists(__DIR__ . '/config.php')) {
    include __DIR__ . '/config.php';
}

/**
 * Register controllers as services
 * @link http://silex.sensiolabs.org/doc/providers/service_controller.html
 * */
$app['app.stands_controller'] = $app->share(function () use ($app) {
    return new \App\Controller\StandsController($app['db'], $app['twig'], $app['logger'], $app['app.stand_manager'], $app['user']);
});
$app['app.user_controller'] = $app->share(function () use ($app) {
    return new \App\Controller\UserController($app['user.manager'], $app['db'], $app['twig'], $app['logger']);
});
$app['app.stand_manager'] = $app->share(function() use ($app) {
    return new App\Model\StandManager($app['db'], $app['user.manager'], $app['user']);
});

$app->get('/secretAdminCreate',function() use ($app){

    die('aceasta pagina nu exista');
    //Ca sa poti accesa aceasta pagina trebuie sa pui secretAdminCreate in security.php in loc de /login
    
    $user = $app['user.manager']->createUser('admin@bestis.ro', 'Passw0rd', 'Name', array('ROLE_ADMIN'));

$app['user.manager']->insert($user);
});

// Map routes to controllers
include __DIR__ . '/routing.php';
//Load DB
include __DIR__ . '/db.php';
//Load Security
include __DIR__ . '/security.php';
//Load session
include __DIR__ . '/session.php';
//Load error handlers
include __DIR__ . '/errors.php';

$app['twig.path'] = array(__DIR__ . '/../src/App/views');
$app['twig.options'] = array('cache' => __DIR__ . '/../app/cache/twig');

$app['user.options'] = array(
    'templates' => array(
        'layout' => 'layout.twig',
        'register' => 'simple_user_register.twig',
//        'register-confirmation-sent' => 'register-confirmation-sent.twig',
        'login' => 'simple_user_login.twig',
//        'login-confirmation-needed' => 'login-confirmation-needed.twig',
//        'forgot-password' => 'forgot-password.twig',
//        'reset-password' => 'reset-password.twig',
//        'view' => 'view.twig',
        'edit' => 'simple_user_edit.twig',
        'list' => 'simple_user_list.twig',
    ),
    'mailer' => array('enabled' => false),
    'editCustomFields' => array('standSize' => 'Stand size'),
    'userClass' => '\App\Security\User',
);

// Add a custom security voter to support testing user attributes.
$app['security.voters'] = $app->extend('security.voters',
        function($voters) use ($app) {

    $voters[] = new App\Security\UserVoter();
    return $voters;
});


return $app;
