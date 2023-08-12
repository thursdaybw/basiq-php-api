<?php

// ContainerFactory.php
namespace BasiqPhpApi;

require 'vendor/autoload.php';
use DI\ContainerBuilder;

class ContainerFactory
{

    public function __construct($basic_application_environment = "sandbox")
    {
        $this->basic_application_environment = $basic_application_environment;
    }

    public function createContainer() {

        // Include the settings file with secrets
        require 'settings.php';

        $builder = new ContainerBuilder();

        $builder->addDefinitions([
            // Parameters
            'base_uri' => 'https://au-api.basiq.io',
            'user_id' => BASIC_TEST_USER_ID,
            'basiq_api_key' => BASIQ_API_KEY,

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
            'BasiqPhpApi\BasiqApi' => \DI\create()
                ->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BearerTokenClient')),
        ]);

        return $builder->build();
    }
}
