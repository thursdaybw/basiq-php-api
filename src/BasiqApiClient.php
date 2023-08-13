<?php

namespace BasiqPhpApi;

use BasiqPhpApi\Endpoint\Registry\BasiqApiRegistry;

class BasiqApiClient {

    private $registry;

    public function __construct(BasiqApiRegistry $registry) {
        $this->registry = $registry;
    }

    public function getEndpoint($name) {
        return $this->registry->getEndpoint($name);
    }

}
