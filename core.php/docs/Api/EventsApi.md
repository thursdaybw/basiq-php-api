# OpenAPI\Client\EventsApi

All URIs are relative to https://au-api.basiq.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getEventTypeById()**](EventsApi.md#getEventTypeById) | **GET** /events/types/{id} | Retrieve an event type |
| [**getEvents()**](EventsApi.md#getEvents) | **GET** /events | List all events |
| [**listEventTypes()**](EventsApi.md#listEventTypes) | **GET** /events/types/ | List event types |


## `getEventTypeById()`

```php
getEventTypeById($id): \OpenAPI\Client\Model\EventType
```

Retrieve an event type

![Beta](https://img.shields.io/badge/Status-Beta-yellow)  Returns a single event type based on the parameter input.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = user.created; // string

try {
    $result = $apiInstance->getEventTypeById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->getEventTypeById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\OpenAPI\Client\Model\EventType**](../Model/EventType.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEvents()`

```php
getEvents($filter): \OpenAPI\Client\Model\EventsGetResponseResource
```

List all events

Returns a list of all events that have taken place.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$filter = user.id.eq(userId) OR event.entity.eq(entity), event.type.eq(type); // string | userId for the specific user you wish to retrieve events for. e.g user.id.eq(userId) Entity can be filtered with type for events for. e.g event.entity.eq(entity), event.type.eq(type)

try {
    $result = $apiInstance->getEvents($filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->getEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **filter** | **string**| userId for the specific user you wish to retrieve events for. e.g user.id.eq(userId) Entity can be filtered with type for events for. e.g event.entity.eq(entity), event.type.eq(type) | [optional] |

### Return type

[**\OpenAPI\Client\Model\EventsGetResponseResource**](../Model/EventsGetResponseResource.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEventTypes()`

```php
listEventTypes(): \OpenAPI\Client\Model\EventTypes
```

List event types

![Beta](https://img.shields.io/badge/Status-Beta-yellow)  Returns a list of event types.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\EventsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->listEventTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventsApi->listEventTypes: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\OpenAPI\Client\Model\EventTypes**](../Model/EventTypes.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
