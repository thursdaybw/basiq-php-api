<?php

namespace BasiqPhpApi\Cache;

interface CacheInterface {

  public function getItem(string $key);

  public function setItem(string $key, $value): void;

}
