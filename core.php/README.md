# OpenAPIClient-php

All included utility endpoints for Basiq partners


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## API Endpoints

All URIs are relative to *https://au-api.basiq.io*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AuthLinksApi* | [**deleteAuthLink**](docs/Api/AuthLinksApi.md#deleteauthlink) | **DELETE** /users/{userId}/auth_link | Delete an auth_link
*AuthLinksApi* | [**getAuthLink**](docs/Api/AuthLinksApi.md#getauthlink) | **GET** /users/{userId}/auth_link | Retrieve an auth_link
*AuthLinksApi* | [**postAuthLink**](docs/Api/AuthLinksApi.md#postauthlink) | **POST** /users/{userId}/auth_link | Create an auth_link
*AuthenticationApi* | [**postToken**](docs/Api/AuthenticationApi.md#posttoken) | **POST** /token | Generate an auth token
*ConsentsApi* | [**deleteConsent**](docs/Api/ConsentsApi.md#deleteconsent) | **DELETE** /users/{userId}/consents/{consentId} | Delete a consent
*ConsentsApi* | [**getConsents**](docs/Api/ConsentsApi.md#getconsents) | **GET** /users/{userId}/consents | Retrieve consents
*EventsApi* | [**getEventTypeById**](docs/Api/EventsApi.md#geteventtypebyid) | **GET** /events/types/{id} | Retrieve an event type
*EventsApi* | [**getEvents**](docs/Api/EventsApi.md#getevents) | **GET** /events | List all events
*EventsApi* | [**listEventTypes**](docs/Api/EventsApi.md#listeventtypes) | **GET** /events/types/ | List event types
*JobsApi* | [**getJobs**](docs/Api/JobsApi.md#getjobs) | **GET** /jobs/{jobId} | Retrieve a job
*JobsApi* | [**getUserJobs**](docs/Api/JobsApi.md#getuserjobs) | **GET** /users/{userId}/jobs | Get user jobs
*JobsApi* | [**postJobMfa**](docs/Api/JobsApi.md#postjobmfa) | **POST** /jobs/{jobId}/mfa | Create MFA response
*UsersApi* | [**createUser**](docs/Api/UsersApi.md#createuser) | **POST** /users | Create a user
*UsersApi* | [**deleteUser**](docs/Api/UsersApi.md#deleteuser) | **DELETE** /users/{userId} | Delete a user
*UsersApi* | [**getUser**](docs/Api/UsersApi.md#getuser) | **GET** /users/{userId} | Retrieve a user
*UsersApi* | [**updateUser**](docs/Api/UsersApi.md#updateuser) | **POST** /users/{userId} | Update a user

## Models

- [AccountClass](docs/Model/AccountClass.md)
- [AccountsContainer](docs/Model/AccountsContainer.md)
- [AccountsData](docs/Model/AccountsData.md)
- [AuthLinkLinks](docs/Model/AuthLinkLinks.md)
- [AuthLinksPostResponseResource](docs/Model/AuthLinksPostResponseResource.md)
- [AuthLinksResponseResource](docs/Model/AuthLinksResponseResource.md)
- [BadRequestError](docs/Model/BadRequestError.md)
- [BadRequestErrorDataInner](docs/Model/BadRequestErrorDataInner.md)
- [Colors](docs/Model/Colors.md)
- [ConnectionAccountLinks](docs/Model/ConnectionAccountLinks.md)
- [ConnectionGetResponseResource](docs/Model/ConnectionGetResponseResource.md)
- [ConnectionInstitution](docs/Model/ConnectionInstitution.md)
- [ConnectionProfile](docs/Model/ConnectionProfile.md)
- [ConnectionResponseResource](docs/Model/ConnectionResponseResource.md)
- [ConnectionsData](docs/Model/ConnectionsData.md)
- [ConnectionsGetResponseResource](docs/Model/ConnectionsGetResponseResource.md)
- [ConnectionsRefreshResource](docs/Model/ConnectionsRefreshResource.md)
- [Connector](docs/Model/Connector.md)
- [ConnectorAuthorization](docs/Model/ConnectorAuthorization.md)
- [ConnectorAuthorizationMeta](docs/Model/ConnectorAuthorizationMeta.md)
- [ConnectorInstitutionResource](docs/Model/ConnectorInstitutionResource.md)
- [ConnectorsList](docs/Model/ConnectorsList.md)
- [CreateUser](docs/Model/CreateUser.md)
- [Data](docs/Model/Data.md)
- [Error](docs/Model/Error.md)
- [ErrorDataInner](docs/Model/ErrorDataInner.md)
- [ErrorDataInnerSource](docs/Model/ErrorDataInnerSource.md)
- [EventType](docs/Model/EventType.md)
- [EventTypeLinks](docs/Model/EventTypeLinks.md)
- [EventTypes](docs/Model/EventTypes.md)
- [EventTypesLinks](docs/Model/EventTypesLinks.md)
- [EventsData](docs/Model/EventsData.md)
- [EventsGetResponseResource](docs/Model/EventsGetResponseResource.md)
- [ForbiddenAccessError](docs/Model/ForbiddenAccessError.md)
- [ForbiddenAccessErrorDataInner](docs/Model/ForbiddenAccessErrorDataInner.md)
- [GetConnectionLinks](docs/Model/GetConnectionLinks.md)
- [GetConnectionsLinks](docs/Model/GetConnectionsLinks.md)
- [GetUserAccount](docs/Model/GetUserAccount.md)
- [GetUserAccountData](docs/Model/GetUserAccountData.md)
- [GetUserConnection](docs/Model/GetUserConnection.md)
- [GetUserConnectionData](docs/Model/GetUserConnectionData.md)
- [GetUserLinks](docs/Model/GetUserLinks.md)
- [GoneError](docs/Model/GoneError.md)
- [GoneErrorDataInner](docs/Model/GoneErrorDataInner.md)
- [IdentitiesGetResponseResource](docs/Model/IdentitiesGetResponseResource.md)
- [IdentityData](docs/Model/IdentityData.md)
- [IdentityDataOrganisation](docs/Model/IdentityDataOrganisation.md)
- [IdentityLinks](docs/Model/IdentityLinks.md)
- [Information](docs/Model/Information.md)
- [InstitutionLogoResource](docs/Model/InstitutionLogoResource.md)
- [InstitutionPerformanceStats](docs/Model/InstitutionPerformanceStats.md)
- [InstitutionPerformanceStatsAverageDurationMs](docs/Model/InstitutionPerformanceStatsAverageDurationMs.md)
- [InternalServerError](docs/Model/InternalServerError.md)
- [InternalServerErrorDataInner](docs/Model/InternalServerErrorDataInner.md)
- [Job](docs/Model/Job.md)
- [JobData](docs/Model/JobData.md)
- [JobLinks](docs/Model/JobLinks.md)
- [JobPostRequest](docs/Model/JobPostRequest.md)
- [JobStepsInner](docs/Model/JobStepsInner.md)
- [JobStepsInnerResult](docs/Model/JobStepsInnerResult.md)
- [JobsData](docs/Model/JobsData.md)
- [JobsInstitution](docs/Model/JobsInstitution.md)
- [JobsLinks](docs/Model/JobsLinks.md)
- [JobsResponseResource](docs/Model/JobsResponseResource.md)
- [JobsResult](docs/Model/JobsResult.md)
- [JobsStep](docs/Model/JobsStep.md)
- [LogoResourceLinks](docs/Model/LogoResourceLinks.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [NotFoundErrorDataInner](docs/Model/NotFoundErrorDataInner.md)
- [Permission](docs/Model/Permission.md)
- [PhysicalAddressData](docs/Model/PhysicalAddressData.md)
- [PhysicalAddresses](docs/Model/PhysicalAddresses.md)
- [PostAuthLinkRequest](docs/Model/PostAuthLinkRequest.md)
- [Primary](docs/Model/Primary.md)
- [Purpose](docs/Model/Purpose.md)
- [ResourceLink](docs/Model/ResourceLink.md)
- [ResourceLinks](docs/Model/ResourceLinks.md)
- [Source](docs/Model/Source.md)
- [StatusServiceUnavailableError](docs/Model/StatusServiceUnavailableError.md)
- [StatusServiceUnavailableErrorDataInner](docs/Model/StatusServiceUnavailableErrorDataInner.md)
- [TokenPostResponse](docs/Model/TokenPostResponse.md)
- [UnauthorizedError](docs/Model/UnauthorizedError.md)
- [UnauthorizedErrorDataInner](docs/Model/UnauthorizedErrorDataInner.md)
- [UpdateUser](docs/Model/UpdateUser.md)
- [UserConsentGetResponse](docs/Model/UserConsentGetResponse.md)
- [UserConsentGetResponses](docs/Model/UserConsentGetResponses.md)
- [UserGetResponse](docs/Model/UserGetResponse.md)
- [UserPostResponse](docs/Model/UserPostResponse.md)

## Authorization

Authentication schemes defined for the API:
### api_key

- **Type**: API key
- **API key parameter name**: Authorization
- **Location**: HTTP header


### services_token

- **Type**: Bearer authentication (JWT)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `3.0.0`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
