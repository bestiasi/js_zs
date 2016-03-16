<?php

/*
 *  Developed by Stefan Matei - stev.matei@gmail.com
 */

$app->error(function (\Exception $e, $code) {

    switch ($code) {
        case 404:
            $message = 'The requested page could not be found.';
            break;
        case 403:
        case 401:
            $message = 'You are trying to access a restricted area.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new \Symfony\Component\HttpFoundation\Response($message);
});
