<?php

namespace BasiqPhpApi\GuzzleWrapper\Factory;

use BasiqPhpApi\BearerTokenManager;
use BasiqPhpApi\GuzzleWrapper\GuzzleClientWrapper;
use BasiqPhpApi\HttpClient\HttpClientWrapperInterface;

/**
 * Class BasiqHttpClientFactory.
 *
 * This class is responsible for creating HTTP clients to interact with the
 * Basiq API.
 */
class GuzzleWrapperWithAuthBearerTokenFactory implements GuzzleWrapperFactoryInterface {

  /**
   * BasiqHttpClientFactory constructor.
   *
   * @param \BasiqPhpApi\BearerTokenManager $tokenHandler
   *   Handler for managing JWT tokens for Basiq API authentication.
   */
  public function __construct(readonly BearerTokenManager $tokenHandler) {}

  /**
   * Creates an HTTP client for interacting with the Basiq API.
   *
   * @return \BasiqPhpApi\HttpClient\HttpClientWrapperInterface
   *   The GuzzleWrapper configured with headers for Basiq API requests.
   */
  public function createClient(string $baseUri): HttpClientWrapperInterface {

    // getToken will take care of getting the current
    // or on the account of expiry, or absence, make the API
    // call to fetch a new one.
    $jwtToken = $this->tokenHandler->getToken();

    $headers = [
      'accept' => 'application/json',
      'authorization' => "Bearer $jwtToken",
      'basiq-version' => '3.0',
    ];

    return new GuzzleClientWrapper($baseUri, $headers);
  }

}
