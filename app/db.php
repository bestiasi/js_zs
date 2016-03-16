<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

$app->register(new Silex\Provider\DoctrineServiceProvider(),
        array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => '127.0.0.1',
        'dbname' => 'js_stand',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ),
));
