<?php

namespace BasiqPhpApi;

use BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBasicFactory;
use BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory;
use Cache\Adapter\Filesystem\FilesystemCachePool;
use DI\ContainerBuilder;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Psr\Container\ContainerInterface;

class ContainerFactory
{

  public function __construct(array $settings) {
    $this->settings = $settings;
  }

  public function createContainer() {

    $builder = new ContainerBuilder();

    $baseUri = $this->settings['base_uri'];
    $api_key = $this->settings['api_key'];

    // Configure the cache directory
    $cacheDir = $this->settings['cache_dir'] ?? __DIR__ . '/../.cache';

    $builder->addDefinitions([
      // Parameters
      'user_id' => $this->settings['user_id'],

      // Guzzle Wrapper Factory.
      GuzzleWrapperWithAuthBasicFactory::class => \DI\create()
        ->constructor($api_key, $baseUri),

      GuzzleWrapperWithAuthBearerTokenFactory::class => \DI\create()
        ->constructor(
          function ($container) {
            return $container->get(BearerTokenManager::class);
          },
          $baseUri
        ),

      // Filesystem Cache
      FilesystemCachePool::class => \DI\create()
        ->constructor(new Filesystem(new Local($cacheDir))),

      // BearerTokenManager with FilesystemCache by default
      BearerTokenManager::class => \DI\factory(
        function (ContainerInterface $container) {
          $basicAuthClient = $container->get(GuzzleWrapperWithAuthBasicFactory::class)->createClient();
          $cache = $container->get(FilesystemCachePool::class);
          return new BearerTokenManager($basicAuthClient, $cache);
        }
      ),

    ]);

    return $builder->build();
  }
}
