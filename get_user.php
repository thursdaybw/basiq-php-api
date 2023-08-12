<?php

namespace BasiqPhpApi;

require 'vendor/autoload.php';
require 'ContainerFactory.php';

/*
 * You will need to create the file. or just create you own inline $settings array.
 * You can copy settings.default.php to settings.php and fill in you user id and API Key.
 */
$containerFactory = new ContainerFactory(require 'settings.php');

$container = $containerFactory->createContainer();

// Now you can use the container to get your services
$basiq_api = $container->get('BasiqPhpApi\Api');
$user = $basiq_api->fetchUser($container->get('user_id'));
print_r($user);
