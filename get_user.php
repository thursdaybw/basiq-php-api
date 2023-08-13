<?php

require 'vendor/autoload.php';

use BasiqPhpApi\BasiqApiClient;
use BasiqPhpApi\ContainerFactory;
use BasiqPhpApi\Endpoint\UserEndpoint;

/*
 * You will need to create the file. or just create you own inline $settings array.
 * You can copy settings.default.php to settings.php and fill in you user id and API Key.
 */
$containerFactory = new ContainerFactory(require 'settings.php');

$container = $containerFactory->createContainer();

$client = $container->get(UserEndpoint::class);

$data = $client->fetchUser($container->get('user_id'));

print_r($data);
