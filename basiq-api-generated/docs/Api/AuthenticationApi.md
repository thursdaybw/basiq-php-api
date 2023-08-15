# OpenAPI\Client\AuthenticationApi

All URIs are relative to https://au-api.basiq.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**postToken()**](AuthenticationApi.md#postToken) | **POST** /token | Generate an auth token |


## `postToken()`

```php
postToken($basiq_version, $scope, $user_id): \OpenAPI\Client\Model\TokenPostResponse
```

Generate an auth token

Use this endpoint to retrieve a token that will be passed as authorization header for Basiq API

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: api_key
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$basiq_version = 3.0; // string
$scope = 'scope_example'; // string
$user_id = 'user_id_example'; // string

try {
    $result = $apiInstance->postToken($basiq_version, $scope, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->postToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **basiq_version** | **string**|  | |
| **scope** | **string**|  | [optional] |
| **user_id** | **string**|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\TokenPostResponse**](../Model/TokenPostResponse.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
