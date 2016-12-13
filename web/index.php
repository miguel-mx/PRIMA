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
    return $app['twig']->render('base.html.twig');
})->bind('home');

// Program
$app->get('/program', function() use($app) {
    return $app['twig']->render('program.html.twig');
})->bind('home');

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
