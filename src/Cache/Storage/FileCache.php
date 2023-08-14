<?php


namespace BasiqPhpApi\Cache\Storage;

use BasiqPhpApi\Cache\CacheInterface;

class FileCache implements CacheInterface {

  private string $cacheDir;

  public function __construct(string $cacheDir) {
    $this->cacheDir = $cacheDir;

    // Create the cache directory if it does not exist
    if (
      !is_dir($this->cacheDir)
      && !mkdir($this->cacheDir, 0777, TRUE)
      && !is_dir($this->cacheDir)
    ) {
      throw new \RuntimeException(sprintf('Directory "%s" was not created', $this->cacheDir));
    }
  }

  public function getItem(string $key) {
    $filePath = $this->getFilePath($key);
    if (file_exists($filePath)) {
      return json_decode(file_get_contents($filePath), TRUE);
    }
    return NULL;
  }

  public function setItem(string $key, $value): void {
    $filePath = $this->getFilePath($key);
    file_put_contents($filePath, json_encode($value));
  }

  private function getFilePath(string $key): string {
    return $this->cacheDir . '/' . md5($key) . '.json';
  }

}
