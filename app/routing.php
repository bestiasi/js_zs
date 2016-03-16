<?php

/**
 * This file should be included from app.php, and is where you hook
 * up routes to controllers.
 *
 * @link http://silex.sensiolabs.org/doc/usage.html#routing
 * @link http://silex.sensiolabs.org/doc/providers/service_controller.html
 */
$app->get('/stands', 'app.stands_controller:indexAction')->bind('stands.map');
$app->get('/user/add', 'app.user_controller:addAccountAction')->bind('user.add');
$app->post('/user/add', 'app.user_controller:addAccountAction')->bind('user.add.post');
$app->post('/stands/reserve', 'app.stands_controller:reserveAction')->bind('stands.reserve');
