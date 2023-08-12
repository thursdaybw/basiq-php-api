<?php

// ContainerFactory.php
namespace BasiqPhpApi;

use DI\ContainerBuilder;

class ContainerFactory
{

    public function __construct(array $settings) {
        $this->settings = $settings;
    }

    public function createContainer() {

        $builder = new ContainerBuilder();

        // Use the settings from the constructor
        $settings = $this->settings;

        $builder->addDefinitions([
            // Parameters
            'base_uri' => $settings['base_uri'],
            'user_id' => $settings['user_id'],
            'basiq_api_key' => $settings['basiq_api_key'],

            // Guzzle Factories
            'BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory' => \DI\create()
                // Pass API Key.
                ->constructor(\DI\get('basiq_api_key')),

            'BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory' => \DI\create()
                // Pass BearerTokenManager as token handler
                ->constructor(\DI\get('BasiqPhpApi\BearerTokenManager')),

            // Basic Auth Client
            'BasiqPhpApi\GuzzleWrapper\BasicAuthClient' => \DI\factory(function ($container) {
                return $container->get('BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory')
                    ->createClient($container->get('base_uri'));
            }),

            // Bearer Token Client
            'BasiqPhpApi\GuzzleWrapper\BearerTokenClient' => \DI\factory(function ($container) {
                return $container->get('BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory')
                    ->createClient($container->get('base_uri'));
            }),

            // Bearer Token Manager
            'BasiqPhpApi\BearerTokenManager' => \DI\create()
                ->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BasicAuthClient')),

            // BasiqApi Clienhttps://github.com/thursdaybw/basiq-php-apit
            'BasiqPhpApi\Api' => \DI\create()
                ->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BearerTokenClient')),
        ]);

        return $builder->build();
    }
}
