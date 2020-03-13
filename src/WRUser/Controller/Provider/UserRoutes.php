<?php
namespace WRUser\Controller\Provider;

use Silex\ControllerProviderInterface;
use Silex\Application;


class UserRoutes implements ControllerProviderInterface {

    public function connect(Application $app)
    {

        if (!$app['resolver'] instanceof \Silex\ServiceControllerResolver) {
            // using RuntimeException crashes PHP?!
            throw new \Exception('You must enable the ServiceController service provider to be able to use these routes.');
        }
        $twig = $app['twig'];
        // Add the paths to our twig templates here
        $fsLoader = new \Twig_Loader_Filesystem(array(
            realpath(__DIR__.'/../../views/').'/',
        ));

        $twig->setLoader(new \Twig_Loader_Chain(array($twig->getLoader(), $fsLoader)));
        // http://silex.sensiolabs.org/doc/2.0/providers.html#included-providers
        $factory = $app["controllers_factory"];

        $factory->get("/encodepass", "WRUser\\Controller\\AuthController::encodePassword")->bind('user.encodepass');

        $factory->method('GET|POST')->match("/login", "WRUser\\Controller\\AuthController::login")->bind('user.login');
        //$factory->post("/login", "WRUser\\Controller\\AuthController::login")->bind('user.login');
        $factory->get("/logout", "WRUser\\Controller\\AuthController::logout")->bind('user.logout');

        $factory->method('GET|POST')->match("/login_check", "WRUser\\Controller\\AuthController::loginCheck")->bind('user.login_check');


        $factory->get("/admin/add", "WRUser\\Controller\\UserController::add")->bind('user.admin.add');
        $factory->post("/admin/add", "WRUser\\Controller\\UserController::add")->bind('user.admin.add');

        $factory->get("/admin/edit", "WRUser\\Controller\\UserController::edit")->bind('user.admin.edit');
        $factory->post("/admin/edit", "WRUser\\Controller\\UserController::edit")->bind('user.admin.edit');

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
