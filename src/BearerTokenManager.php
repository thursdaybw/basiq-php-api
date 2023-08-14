<?php

namespace BasiqPhpApi;

use BasiqPhpApi\Cache\CacheInterface;
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
    readonly CacheInterface $cache,
  ) {

  }
  /**
   * Retrieves the current token or fetches a new one if expired or absent.
   *
   * @return string The access token for Basiq API requests.
   */
  public function getToken() {

    $this->tokenData = $this->cache->getItem('basiq_token');

    if (empty($this->tokenData) || $this->isTokenExpired()) {
      $this->fetchNewToken();
    }

    return $this->tokenData['access_token'];

  }

  /**
   * Checks if the current token is expired.
   *
   * @return bool TRUE if the token is expired, FALSE otherwise.
   */
  private function isTokenExpired() {
    return $this->tokenData['expires_at'] <= time();
  }

  /**
   * Fetches a new token from the Basiq API and saves it to a file.
   */
  private function fetchNewToken() {

    try {
      $form_params = [
        // Use SERVER_ACCESS for full access.
        'scope' => 'SERVER_ACCESS',
      ];

      $this->tokenData = $this->basicAuthClient->post("/token", $form_params);

      $statusCode = $this->basicAuthClient->getStatusCode();

      if ($statusCode === 200) {
        // Calculate the expiration time.
        // @todo extract to a method.
        $this->tokenData['expires_at'] = time() + $this->tokenData['expires_in'];
        unset($this->tokenData['expires_in']);
        $this->cache->setItem('basiq_token', $this->tokenData);
      }
      else {
        // @todo Handle other status codes as needed
        // You may log the error or throw an exception.
      }
    }
    catch (RequestException $e) {
      $e = $e;
      // Handle exceptions related to the request
      // You may log the error or throw an exception.
    }
  }

  /**
   * Reads token data from a file.
   *
   * @return array The token data as an associative array.
   */
  private function readTokenDataFromFile() {

    if (file_exists($this->tokenFilePath)) {
      $jsonContent = file_get_contents($this->tokenFilePath);
      // Decode the JSON as an associative array.
      $tokenData = json_decode($jsonContent, TRUE);
    }
    else {
      $tokenData = [];
    }

    return $tokenData;
  }

  /**
   * Saves token data to a file, including calculating the expiration time.
   *
   * @param array $data
   *   The token data to save.
   *
   * @return string The JSON data written to the file.
   *
   * @throws \Exception If the file could not be written.
   */
  private function saveTokenDataToFile($data) {
    $this->tokenData = $data;

    // Calculate the expiration time.
    // @todo extract to a method.
    $data['expires_at'] = time() + $data['expires_in'];
    unset($data['expires_in']);

    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    if (file_put_contents($this->tokenFilePath, $jsonData) === FALSE) {
      // Handle the error if the file could not be written.
      throw new \Exception('Failed to write to ' . $this->tokenFilePath);
    }

    return $jsonData;
  }

}
