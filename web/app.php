<?php
// require autoloader for silex
require_once __DIR__.'/../vendor/autoload.php';

// create new app
$app = new Silex\Application();

// configuration options
$app['debug'] = true;

// registrations
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//routing
$app->get('/', function() use ($app) {
    return "howdy world.";
}); 

// make it so.
$app->run();