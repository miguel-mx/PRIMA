<?php

require_once __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

//$app['debug'] = true;

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Register Twig provider and define a path for twig templates
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Landing
$app->get('/', function() use($app) {
    return $app['twig']->render('landing.html.twig');
})->bind('index');

// Home
$app->get('/home', function() use($app) {
    return $app['twig']->render('home.html.twig');
})->bind('home');

// Program
$app->get('/program', function() use($app) {
    return $app['twig']->render('program.html.twig');
})->bind('program');

// Financial assistance
$app->get('/financial-assistance', function() use($app) {
    return $app['twig']->render('financial.html.twig');
})->bind('financial-assistance');

// Plenary Speakers
$app->get('/plenary-speakers', function() use($app) {
    return $app['twig']->render('speakers.html.twig');
})->bind('plenary-speakers');

// Sponsors
$app->get('/sponsors', function() use($app) {
    return $app['twig']->render('sponsors.html.twig');
})->bind('sponsors');

// Oaxaca
$app->get('/oaxaca', function() use($app) {
    return $app['twig']->render('oaxaca.html.twig');
})->bind('oaxaca');

// Contact
$app->get('/contact', function() use($app) {
    return $app['twig']->render('contact.html.twig');
})->bind('contact');

// Hook
$app->get('/hook', function() use($app) {

    `git pull`;
    return $app->redirect('home');

})->bind('hook');

// 404 - Page not found
$app->error(function (\Exception $e, $code) use ($app) {
    switch ($code) {
        case 404:
          return $app['twig']->render('404.html.twig');
            $message = 'The requested page could not be found.';
            break;
        default:
            $message = 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message);
});

$app->run();
