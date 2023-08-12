<?php

require 'vendor/autoload.php';
require 'settings.php';

use DI\ContainerBuilder;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    // Parameters
    'base_uri' => 'https://au-api.basiq.io',

    // Guzzle Factories
    'BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory' => \DI\create(),
    'BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory' => \DI\create()
        ->constructor(\DI\get('BasiqPhpApi\BearerTokenManager')), // Pass BearerTokenManager as token handler

    // Basic Auth Client
    'BasiqPhpApi\GuzzleWrapper\BasicAuthClient' => \DI\factory(function ($container) {
        return $container->get('BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory')->createClient($container->get('base_uri'));
    }),

    // Bearer Token Client
    'BasiqPhpApi\GuzzleWrapper\BearerTokenClient' => \DI\factory(function ($container) {
        return $container->get('BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory')->createClient($container->get('base_uri'));
    }),

    // Bearer Token Manager
    'BasiqPhpApi\BearerTokenManager' => \DI\create()
        ->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BasicAuthClient')),

    // BasiqApi Clienhttps://github.com/thursdaybw/basiq-php-apit
    'BasiqPhpApi\Api' => \DI\create()
        ->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BearerTokenClient')),
]);

$container = $builder->build();

