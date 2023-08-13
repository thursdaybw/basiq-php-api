<?php

namespace BasiqPhpApi\Endpoint;

use BasiqPhpApi\HttpClient\HttpClientWrapperInterface;

interface EndpointInterface {

    public function __construct(HttpClientWrapperInterface $httpClient);

    //public function request(string $method, string $url);

}
