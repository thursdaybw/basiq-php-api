# OpenAPI\Client\AuthLinksApi

All URIs are relative to https://au-api.basiq.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteAuthLink()**](AuthLinksApi.md#deleteAuthLink) | **DELETE** /users/{userId}/auth_link | Delete an auth_link |
| [**getAuthLink()**](AuthLinksApi.md#getAuthLink) | **GET** /users/{userId}/auth_link | Retrieve an auth_link |
| [**postAuthLink()**](AuthLinksApi.md#postAuthLink) | **POST** /users/{userId}/auth_link | Create an auth_link |


## `deleteAuthLink()`

```php
deleteAuthLink($user_id)
```

Delete an auth_link

<blockquote>Note that this action cannot be undone.</blockquote>  <blockquote>The auth_link is a URL that directs a User to Basiq's hosted consent workflow to link banks and securely share data. When the user selects 'I have disclosed all my accounts' the auth_link is automatically deleted.</blockquote>  Returns an empty body if the delete succeeded. Otherwise, this call returns an error in the event of a failure.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AuthLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The identifier of the user.

try {
    $apiInstance->deleteAuthLink($user_id);
} catch (Exception $e) {
    echo 'Exception when calling AuthLinksApi->deleteAuthLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| The identifier of the user. | |

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

## `getAuthLink()`

```php
getAuthLink($user_id): \OpenAPI\Client\Model\AuthLinksResponseResource
```

Retrieve an auth_link

Returns the latest/last auth_link generated for the specified user. Returns an error otherwise.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AuthLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The identifier of the user.

try {
    $result = $apiInstance->getAuthLink($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthLinksApi->getAuthLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| The identifier of the user. | |

### Return type

[**\OpenAPI\Client\Model\AuthLinksResponseResource**](../Model/AuthLinksResponseResource.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postAuthLink()`

```php
postAuthLink($user_id, $post_auth_link_request): \OpenAPI\Client\Model\AuthLinksPostResponseResource
```

Create an auth_link

Create a new auth_link object by making a POST request to the auth_link endpoint. The new auth_link will effectively delete previous auth_link for that user, rendering the previous URL(s) invalid.   The 'mobile' attribute is used for 2FA SMS verification and is conditionally required. If it is not specified, we will look up the mobile on the user object; if that is not specified either, you will get an error.  If both are specified, the mobile number on the auth_link will take precedence.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\AuthLinksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string
$post_auth_link_request = new \OpenAPI\Client\Model\PostAuthLinkRequest(); // \OpenAPI\Client\Model\PostAuthLinkRequest

try {
    $result = $apiInstance->postAuthLink($user_id, $post_auth_link_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthLinksApi->postAuthLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**|  | |
| **post_auth_link_request** | [**\OpenAPI\Client\Model\PostAuthLinkRequest**](../Model/PostAuthLinkRequest.md)|  | [optional] |

### Return type

[**\OpenAPI\Client\Model\AuthLinksPostResponseResource**](../Model/AuthLinksPostResponseResource.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
