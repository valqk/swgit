<?php
// http://silex.sensiolabs.org/doc/2.0/providers.html#included-providers
// http://silex.sensiolabs.org/doc/providers.html#creating-a-provider
$app->register(new \Silex\Provider\ServiceControllerServiceProvider());



$app->register(new Silex\Provider\TwigServiceProvider(), array(
    //'twig.path' => __DIR__ . '/../src/SimpleWebGit/views',//__DIR__.'/views',
    //'twig.options' => array('cache' => false, 'strict_variables' => true)
));


$app->register(new \Silex\Provider\RememberMeServiceProvider());
$app->register(new \Silex\Provider\SessionServiceProvider());
$app->register(new \Silex\Provider\UrlGeneratorServiceProvider());
//$app->register(new \Silex\Provider\SwiftmailerServiceProvider());
$app->register(new \Silex\Provider\ServiceControllerServiceProvider());