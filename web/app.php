<?php
// require autoloader for silex
require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

class RibbitApplication extends Application
{
    use Application\TwigTrait;
    use Silex\Application\UrlGeneratorTrait;
}

// create new app
$app = new RibbitApplication();

// configuration options
$app['debug'] = true;

// registrations
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

//routing
$app->get('/', function() use ($app) {
    return $app->render("index.php.twig");
});

$app->get('/howdy/{name}', function($name) use ($app) {
    return $app->render("index.php.twig", array('name' => $app->escape($name)) );
}); 

// make it so.
$app->run();