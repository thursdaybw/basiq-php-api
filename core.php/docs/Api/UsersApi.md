# OpenAPI\Client\UsersApi

All URIs are relative to https://au-api.basiq.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createUser()**](UsersApi.md#createUser) | **POST** /users | Create a user |
| [**deleteUser()**](UsersApi.md#deleteUser) | **DELETE** /users/{userId} | Delete a user |
| [**getUser()**](UsersApi.md#getUser) | **GET** /users/{userId} | Retrieve a user |
| [**updateUser()**](UsersApi.md#updateUser) | **POST** /users/{userId} | Update a user |


## `createUser()`

```php
createUser($create_user): \OpenAPI\Client\Model\UserPostResponse
```

Create a user

Creates a new Basiq user object

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_user = new \OpenAPI\Client\Model\CreateUser(); // \OpenAPI\Client\Model\CreateUser

try {
    $result = $apiInstance->createUser($create_user);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->createUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_user** | [**\OpenAPI\Client\Model\CreateUser**](../Model/CreateUser.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UserPostResponse**](../Model/UserPostResponse.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteUser()`

```php
deleteUser($user_id)
```

Delete a user

Permanently deletes a user along with all of their associated connection details. All data associated with this user will deleted. You need only supply the unique user identifier that was returned upon user creation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User identification.

try {
    $apiInstance->deleteUser($user_id);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->deleteUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User identification. | |

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

## `getUser()`

```php
getUser($user_id): \OpenAPI\Client\Model\UserGetResponse
```

Retrieve a user

Retrieves the details of an existing user. You need only supply the unique user identifier that was returned upon user creation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The identifier of the user to be retrieved.

try {
    $result = $apiInstance->getUser($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->getUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| The identifier of the user to be retrieved. | |

### Return type

[**\OpenAPI\Client\Model\UserGetResponse**](../Model/UserGetResponse.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateUser()`

```php
updateUser($user_id, $user): \OpenAPI\Client\Model\UserPostResponse
```

Update a user

Updates the specified user by setting the values of the parameters passed. Any parameters not provided will be left unchanged.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\UsersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | The identifier of the user to be retrieved.
$user = new \OpenAPI\Client\Model\UpdateUser(); // \OpenAPI\Client\Model\UpdateUser

try {
    $result = $apiInstance->updateUser($user_id, $user);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UsersApi->updateUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| The identifier of the user to be retrieved. | |
| **user** | [**\OpenAPI\Client\Model\UpdateUser**](../Model/UpdateUser.md)|  | |

### Return type

[**\OpenAPI\Client\Model\UserPostResponse**](../Model/UserPostResponse.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
