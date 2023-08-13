<?php

namespace BasiqPhpApi\Endpoint;

use BasiqPhpApi\HttpClient\HttpClientWrapperInterface;

abstract class EndpointBase {

    protected $httpClient;

    public function __construct(HttpClientWrapperInterface $httpClient) {
        $this->httpClient = $httpClient;
    }

    protected function request(string $method, string $url) {
        return $this->httpClient->request($method, $url);
    }

}
