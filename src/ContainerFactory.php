<?php

// ContainerFactory.php
namespace BasiqPhpApi;

use BasiqPhpApi\Endpoint\UserEndpoint;
use BasiqPhpApi\Endpoint\Registry\BasiqApiRegistry;
use BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory;
use BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory;
use DI\ContainerBuilder;

class ContainerFactory
{

    public function __construct(array $settings) {
        $this->settings = $settings;
    }

    public function createContainer() {

        $builder = new ContainerBuilder();

        // Bearer Token Client
        $baseUri = $this->settings['base_uri'];
        $api_key = $this->settings['api_key'];

        $builder->addDefinitions([
            // Parameters
            'user_id' => $this->settings['user_id'],

            // Guzzle Wrapper Factory.
            GuzzleWrapperWithAuthBasicFactory::class => \DI\create()
                ->constructor($api_key),

            // Bearer Token Manager.
            BearerTokenManager::class => \DI\create()
                ->constructor(
                    function ($container) use ($baseUri) {
                        return $container->get(GuzzleWrapperWithAuthBasicFactory::class)->createClient($baseUri);
                    }
                ),

            // Auto-discover classes in the BasiqPhpApi\Endpoint namespace.
            'BasiqPhpApi\Endpoint\*' => \DI\create()->constructor(
                function ($container) use ($baseUri) {
                    return $container->get(GuzzleWrapperWithAuthBearerTokenFactory::class)->createClient($baseUri);
                }
            ),

        ]);

        return $builder->build();
    }
}
