<?php

require 'vendor/autoload.php';

use BasiqPhpApi\BasiqApiClient;
use BasiqPhpApi\ContainerFactory;
use BasiqPhpApi\Endpoint\UserEndpoint;
use BasiqPhpApi\PluginManager;

/*
 * You will need to create the file. or just create you own inline $settings array.
 * You can copy settings.default.php to settings.php and fill in you user id and API Key.
 */
$containerFactory = new ContainerFactory(require 'settings.php');

$container = $containerFactory->createContainer();

$plugin_manager = $container->get(PluginManager::class);

$client = $plugin_manager->getPlugin('UserEndpoint');

$data = $client->fetchUser($container->get('user_id'));

print_r($data);
