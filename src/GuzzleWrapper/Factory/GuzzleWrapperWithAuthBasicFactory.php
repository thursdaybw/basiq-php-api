<?php

namespace BasiqPhpApi\GuzzleWrapper\Factory;

use BasiqPhpApi\GuzzleWrapper\GuzzleClientWrapper;

/**
 * Class HttpApplicationWithAuthBasicFactory.
 *
 * This class is responsible for creating HTTP clients specifically for
 * handling JWT authentication tokens with the Basiq API.
 */
class GuzzleWrapperWithAuthBasicFactory implements GuzzleWrapperFactoryInterface {

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

  /**
   * Creates an HTTP client which handles JWT auth tokens with the Basiq API.
   *
   * @return \BasiqPhpApi\GuzzleWrapper\GuzzleClientWrapper
   *   The HTTP client configured with the base URI and headers for JWT auth.
   */
  public function createClient(string $baseUri): GuzzleClientWrapper {
    $headers = [
      'accept' => 'application/json',
      'authorization' => 'Basic ' . $this->apiKey,
      'basiq-version' => '3.0',
      'content-type' => 'application/x-www-form-urlencoded',
    ];

    return new GuzzleClientWrapper($baseUri, $headers);
  }

}
