<?php

namespace BasiqPhpApi;

require 'vendor/autoload.php';

require 'ContainerFactory.php';

$containerFactory = new ContainerFactory();
$container = $containerFactory->createContainer();

// Now you can use the container to get your services
$basiq_api = $container->get('BasiqPhpApi\BasiqApi');
$user = $basiq_api->fetchUser($container->get('user_id'));
print_r($user);

