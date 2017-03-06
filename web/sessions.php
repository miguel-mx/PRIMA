<?php

// sessions.php
$sessions = $app['controllers_factory'];
$sessions->get('/', function () { return 'Sesions Home'; });

// Sessions Matroid
$sessions->get('/matroid-theory', function() use($app) {

    return $app['twig']->render('sessions/matroid-theory.html.twig');

})->bind('matroid-theory');

// Nonlinear Elliptic PDE and Systems
$sessions->get('/nonlinear-elliptic-pde-and-systems', function() use($app) {

    return $app['twig']->render('sessions/nonlinear-elliptic-pde-and-systems.html.twig');

})->bind('nonlinear-elliptic-pde-and-systems');


return $sessions;
