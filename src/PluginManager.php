<?php

namespace BasiqPhpApi;

use BasiqPhpApi\Endpoint\EndpointInterface;
use BasiqPhpApi\GuzzleWrapper\Factory\GuzzleWrapperWithAuthBearerTokenFactory;

class PluginManager {

    const INTERFACE = EndpointInterface::class;

    private static $plugins = [];

    public function __construct(readonly GuzzleWrapperWithAuthBearerTokenFactory $clientFactory) {}


    public function discoverPlugins()
    {
        if (empty(self::$plugins)) {
            $path = __DIR__ . '/Endpoint/*.php';
            foreach (glob($path) as $file) {
                if (substr(basename($file, '.php'), -8) === 'Endpoint') {
                    $class = '\\BasiqPhpApi\\Endpoint' . '\\' . basename($file, '.php');
                    if (in_array(self::INTERFACE, class_implements($class))) {
                        $lastNamespaceSeparator = strrpos($class, '\\');
                        $classNameWithoutNamespace = substr($class, $lastNamespaceSeparator + 1);
                        self::$plugins[$classNameWithoutNamespace] = $class;
                    }
                }
            }
        }
        return self::$plugins;
    }

    public function getPlugin($pluginId) {
        $class = $this->discoverPlugins()[$pluginId];
        return new $class($this->clientFactory->createClient());
    }

}
