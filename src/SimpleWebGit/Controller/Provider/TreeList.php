<?php
namespace SimpleWebGit\Controller\Provider;

use Silex\ControllerProviderInterface;
use Silex\Application;

class TreeList implements ControllerProviderInterface {

    public function connect(Application $app)
    {
    /**
     * @var \Twig_Environment $twig
     */
    $twig = $app['twig'];
    // Add the paths to our twig templates here
    $fsLoader = new \Twig_Loader_Filesystem(array(
        realpath(__DIR__.'/../../views/').'/',
    ));

$twig->setLoader(new \Twig_Loader_Chain(array($twig->getLoader(), $fsLoader)));        // http://silex.sensiolabs.org/doc/2.0/providers.html#included-providers
        $factory = $app["controllers_factory"];

        $factory->get("/", "SimpleWebGit\\Controller\\TreeListController::index");

        //$factory->post("/", "MyApp\\Controller\\UserController::store");
        //$factory->get("/{id}", "MyApp\\Controller\\UserController::show");
        //$factory->get("/edit/{id}", "MyApp\\Controller\\UserController::edit");
        //$factory->put("/{id}", "MyApp\\Controller\\UserController::update");
        //$factory->delete("/{id}", "MyApp\\Controller\\UserController::destroy");


        //before, after, finish
        $factory->before(function() {

        });

        return $factory;
    }
}
