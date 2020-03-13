<?php
namespace WRUser\Controller;

use \App\MyApp;
use Symfony\Component\HttpFoundation\Request;

class AuthController {

    public function login(Request $request, MyApp $app) {
        // show the list of files in / of cwr
        $user = $app->user();
        print_r($user);
        $data =    array(
            'error'         => isset($app['security.last_error']) ? $app['security.last_error']($request): null,
            'last_username' => $app['session']->get('_security.last_username'),
        );
        // find the encoder for a UserInterface instance
        //$encoder = $app['security.encoder_factory']->getEncoder($app['security.default_encoder']);

        // compute the encoded password for foo
        //$password = $encoder->encodePassword('foo', $user->getSalt());
        //echo $password;exit;
        return $app->renderView('auth/login.html.twig', $data);
    }
    public function loginCheck(Request $request, MyApp $app) {
        $user = $app['security.token_storage']->getToken();
        //$user = $app['user'];
        //var_dump($user);exit;
        //echo $app->encodePassword($user, 'foo');
        //exit;
        //return true;
    }

    public function encodePassword(Request $req, MyApp $app) {
                $password = $req->get('password');
                $encoded = $app['security.encoder.digest']->encodePassword($password);
        return $app->renderView('auth/encodepass.html.twig', [ 'password' => $password, 'encoded' => $encoded]);
    }

}