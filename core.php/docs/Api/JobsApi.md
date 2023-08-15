# OpenAPI\Client\JobsApi

All URIs are relative to https://au-api.basiq.io, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getJobs()**](JobsApi.md#getJobs) | **GET** /jobs/{jobId} | Retrieve a job |
| [**getUserJobs()**](JobsApi.md#getUserJobs) | **GET** /users/{userId}/jobs | Get user jobs |
| [**postJobMfa()**](JobsApi.md#postJobMfa) | **POST** /jobs/{jobId}/mfa | Create MFA response |


## `getJobs()`

```php
getJobs($job_id): \OpenAPI\Client\Model\Job
```

Retrieve a job

Retrieves the details of an existing job. You need only supply the unique job identifier that was returned upon job creation.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string | The identifier of the job to be retrieved.

try {
    $result = $apiInstance->getJobs($job_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->getJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**| The identifier of the job to be retrieved. | |

### Return type

[**\OpenAPI\Client\Model\Job**](../Model/Job.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserJobs()`

```php
getUserJobs($user_id, $filter): \OpenAPI\Client\Model\JobsResponseResource
```

Get user jobs

Retrieves the details of all existing and previous jobs associated with a user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User identifier
$filter = 'filter_example'; // string | Connection identification filter. e.g. connection.id.eq('ab63cd')

try {
    $result = $apiInstance->getUserJobs($user_id, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->getUserJobs: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User identifier | |
| **filter** | **string**| Connection identification filter. e.g. connection.id.eq(&#39;ab63cd&#39;) | [optional] |

### Return type

[**\OpenAPI\Client\Model\JobsResponseResource**](../Model/JobsResponseResource.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postJobMfa()`

```php
postJobMfa($job_id, $job_post_request): \OpenAPI\Client\Model\ConnectionResponseResource
```

Create MFA response

Ensure that you generate an authentication token with scope = CLIENT_ACCESS and basiq-version = 3.0 to create this resource

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (JWT) authorization: services_token
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\JobsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$job_id = 'job_id_example'; // string | The identifier of the job.
$job_post_request = new \OpenAPI\Client\Model\JobPostRequest(); // \OpenAPI\Client\Model\JobPostRequest

try {
    $result = $apiInstance->postJobMfa($job_id, $job_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobsApi->postJobMfa: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **job_id** | **string**| The identifier of the job. | |
| **job_post_request** | [**\OpenAPI\Client\Model\JobPostRequest**](../Model/JobPostRequest.md)|  | |

### Return type

[**\OpenAPI\Client\Model\ConnectionResponseResource**](../Model/ConnectionResponseResource.md)

### Authorization

[services_token](../../README.md#services_token)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
