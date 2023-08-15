# OpenAPI\Client\ConsentsApi

All URIs are relative to https://au-api.basiq.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteConsent()**](ConsentsApi.md#deleteConsent) | **DELETE** /users/{userId}/consents/{consentId} | Delete a consent |
| [**getConsents()**](ConsentsApi.md#getConsents) | **GET** /users/{userId}/consents | Retrieve consents |


## `deleteConsent()`

```php
deleteConsent($user_id, $consent_id)
```

Delete a consent

Permanently deletes a users consent, this action cannot be undone.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ConsentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User identification.
$consent_id = 'consent_id_example'; // string | Consent identification.

try {
    $apiInstance->deleteConsent($user_id, $consent_id);
} catch (Exception $e) {
    echo 'Exception when calling ConsentsApi->deleteConsent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User identification. | |
| **consent_id** | **string**| Consent identification. | |

### Return type

void (empty response body)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getConsents()`

```php
getConsents($user_id): \OpenAPI\Client\Model\UserConsentGetResponses
```

Retrieve consents

Retrieves a list of the user consents

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ConsentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The identifier of the user

try {
    $result = $apiInstance->getConsents($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConsentsApi->getConsents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| The identifier of the user | |

### Return type

[**\OpenAPI\Client\Model\UserConsentGetResponses**](../Model/UserConsentGetResponses.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
