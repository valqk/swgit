<?php


$app->mount("/git", new \SimpleWebGit\Controller\Provider\TreeList());

$app->mount('/user', new \WRUser\Controller\Provider\UserRoutes());
