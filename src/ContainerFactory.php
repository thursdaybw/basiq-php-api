<?php

// ContainerFactory.php
namespace BasiqPhpApi;

use BasiqPhpApi\Endpoint\DataEndpoint;
use BasiqPhpApi\Endpoint\Registry\BasiqApiRegistry;
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
            'api_key' => $settings['api_key'],

            // Guzzle Factories
            'BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory' => \DI\create()
                // Pass API Key.
                ->constructor(\DI\get('api_key')),

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

            // BasiqApi Client.
            'BasiqPhpApi\BasiqApiClient' => \DI\create()
                ->constructor(\DI\get(BasiqApiRegistry::class)),
                //->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BearerTokenClient')),

            //BasiqApiRegistry::class => \DI\create()
             //   ->constructor($builder),


            BasiqApiRegistry::class => function ($container) {
                $registry = new BasiqApiRegistry($container);
                $registry->registerEndpoint('data', DataEndpoint::class);
                return $registry;
            },

            DataEndpoint::class => \DI\autowire()
                ->constructor(\DI\get('BasiqPhpApi\GuzzleWrapper\BearerTokenClient')),

        ]);


       /*
            DataEndpoint::class => \DI\autowire()
            ->constructor(\DI\get('BasiqPhpApi\BasiqApiClient')),

        */

/*
        'httpClient' => function () {
            // Replace with the actual logic to create the HTTP client
            return new HttpClient(); // Your specific HTTP client class
        },
*/



        return $builder->build();
    }
}
