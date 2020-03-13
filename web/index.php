<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
define('SESSION_KEY', 'some_key');

class MyApp extends \Silex\Application {
    use \Silex\Application\TwigTrait;
    use \Silex\Application\SecurityTrait;
    use \Silex\Application\FormTrait;
    use \Silex\Application\UrlGeneratorTrait;

    /*
    use Application\MonologTrait;
    use Application\SwiftmailerTrait;
    use Application\TranslationTrait;
    */
}
use Silex\Route;

class MyRoute extends Route {
    use Route\SecurityTrait;
}

//$app = new Silex\Application();
$app = new MyApp();

$app['route_class'] = '\App\MyRoute';

include __DIR__ . '/../app/providers.php';
include __DIR__ . '/../app/routes.php';
include __DIR__ . '/../app/security.php';



//$app->get("/", "MyApp\Controller\HomeController::index");

//$app->mount("/users", new \MyApp\Controller\Provider\User());


$app['debug'] = true;
$app->run();
