<?php

namespace BasiqPhpApi\Endpoint\Registry;

use DI\Container;

class BasiqApiRegistry {

    private Container $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function registerEndpoint($name, $class) {
        $this->container->set($name, function () use ($class) {
            return new $class($this->container->get('BasiqPhpApi\GuzzleWrapper\BearerTokenClient'));
        });
    }

    public function getEndpoint($name) {
        return $this->container->get($name);
    }
}
