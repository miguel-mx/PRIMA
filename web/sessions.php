<?php

// sessions.php
$sessions = $app['controllers_factory'];
$sessions->get('/', function () { return 'Sesions Home'; });

// Sessions Matroid
$sessions->get('/matroid-theory', function() use($app) {

    return $app['twig']->render('sessions/matroid-theory.html.twig');

})->bind('matroid-theory');


return $sessions;
