<?php

namespace BasiqPhpApi;

use Psr\Cache\CacheItemPoolInterface;
use BasiqPhpApi\GuzzleWrapper\GuzzleClientWrapper;
use GuzzleHttp\Exception\RequestException;

/**
 * Class TokenHandler.
 *
 * This class is responsible for handling JWT tokens for Basiq API
 * authentication.
 */
class BearerTokenManager {

  private $tokenData = [];

  public function __construct(
    readonly GuzzleClientWrapper $basicAuthClient,
    readonly CacheItemPoolInterface $cache,
  ) {
  }

  /**
   * Retrieves the current token or fetches a new one if expired or absent.
   *
   * @return string The access token for Basiq API requests.
   */
  public function getToken() {
    $item = $this->cache->getItem('basiq_token');

    if (!$item->isHit() || $this->isTokenExpired($item->get())) {
      $this->fetchNewToken();
      $item = $this->cache->getItem('basiq_token'); // Re-fetch the item
    }

    return $item->get()['access_token'];
  }

  /**
   * Checks if the current token is expired.
   *
   * @return bool TRUE if the token is expired, FALSE otherwise.
   */
  private function isTokenExpired($tokenData) {
    return $tokenData['expires_at'] <= time();
  }

  /**
   * Fetches a new token from the Basiq API and saves it to a file.
   */
  private function fetchNewToken() {
    try {

      $form_params = [
        'scope' => 'SERVER_ACCESS',
      ];

      $this->tokenData = $this->basicAuthClient->post("/token", $form_params);

      $statusCode = $this->basicAuthClient->getStatusCode();

      if ($statusCode === 200) {
        // Calculate the expiration time.
        // @todo extract to a method.
        $this->tokenData['expires_at'] = time() + $this->tokenData['expires_in'];
        unset($this->tokenData['expires_in']);
        $item = $this->cache->getItem('basiq_token');

        $item->set($this->tokenData);
        $this->cache->save($item);
      }
      else {
        // Handle other status codes as needed
      }
    }
    catch (RequestException $e) {
      // Handle exceptions related to the request
    }
  }
}
