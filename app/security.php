<?php



// Security service
$app->register(new \Silex\Provider\SecurityServiceProvider());
$app['security.firewalls'] = [
/*
    'secured' => array(
        'anonymous' => false,
        'pattern' => '^/.*$',
        'form' => array('login_path' => '/user/login', 'check_path' => '/user/login_check'),
        'logout' => array('logout_path' => '/user/logout'),
        //'users' => $app->share(function () { return new \WRUsers\UserAuthUserProvider(); }),
    ),
    'git' => array(
        'pattern' => '^/git/',
        'form' => array('login_path' => '/user/login', 'check_path' => '/user/login_check'),
        'users' => array(
            'admin' => array('ROLE_ADMIN', '$2y$10$3i9/lVd8UOFIJ6PAMFt8gu3/r5g0qeCJvoSlLCsvMTythye19F77a'),
        ),
    ),
*/
    'login' => [
        'pattern' => '^/user/login|/user/encodepass$',
        'anonymous' => true,
    ],
    'secure' => [
        'pattern'     => '^/',
        'form' => ['login_path' => '/login','check_path' => '/login_check'],
        'logout' => ['logout_path' => '/user/logout'],
        /*
        'remember_me' => [
            'key'                => 'RandomKeyForRememberme',
            'always_remember_me' => true,
            /* Other options * /
        ],
        */
        'users' => [
            'admin' => array('ROLE_ADMIN', 'nhDr7OyKlXQju+Ge/WKGrPQ9lPBSUFfpK+B1xqx/+8zLZqRNX0+5G1zBQklXUFy86lCpkAofsExlXiorUcKSNQ=='),
        ],
    ],
];

$app['security.authentication.success_handler.secure'] =
  $app->share(function() use ($app) {
    return new \WRUser\CustomAuthenticationSuccessHandler($app['security.http_utils'],
    array(), $app);
  });

$app['security.access_rules'] = array(
    array('^/git', 'ROLE_USER'),
    array('^/user/admin', 'ROLE_ADMIN'),
);