<?php
namespace WRUser;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Silex\Application;

class CustomAuthenticationSuccessHandler extends DefaultAuthenticationSuccessHandler
{
  protected $app = null;

  public function __construct(HttpUtils $httpUtils, array $options, Application $app)
  {
    parent::__construct($httpUtils, $options);
    $this->app = $app;
  }

  public function onAuthenticationSuccess(Request $request, TokenInterface $token)
  {
    $user = $token->getUser();
    $data = array(
        'last_login' => date('Y-m-d H:i:s')
    );
    //echo 'D:::';
    //print_r($user);exit;
    // save the last login of the user
    $this->app['account']->updateUserData($user->getUsername(), $data);

    return $this->httpUtils->createRedirectResponse($request, $this->determineTargetUrl($request));
  }
}
