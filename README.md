# Basiq PHP API

The Basiq PHP API is a library designed to simplify interaction with the Basiq REST API. It provides a common and simple interface for retrieving banking data, building budget apps, tracking spending, and more.

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Features](#features)
- [Components](#components)
- [Security Considerations](#security-considerations)
- [Use Case Implementation](#use-case-implementation)
- [Future Considerations](#future-considerations)
- [Dependencies](#dependencies)

## Installation

Since the package is not published, you'll need to add the repository to your `composer.json` file and then require it using Composer.

1. Add the repository to your `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/thursdaybw/basiq-php-api"
    }
],
```

2. Run the Composer require command:

```bash
composer require thursdaybw/basiq-php-api
```

## Configuration

Copy the `settings.default.php` file to `settings.php` and fill in the appropriate values:

- `baseuri`: The base domain of the Basiq v3 API (e.g., `https://au.api.basiq.io`).
- `userid`: The ID of the user in the "application" that the REST API pulls its data from.
- `apikey`: The API key of the Basiq application behind the REST API.

## Usage

Refer to the `get_user.php` file for an example of how to use the Basiq PHP API to fetch a user's information. Here's a summary:

1. Include dependencies and load settings from `settings.php`.
2. Create a container using the `ContainerFactory`.
3. Get the Basiq API services and fetch a user by ID.

```php
use basiqphpapi\ContainerFactory;
require 'vendor/autoload.php';

// Load settings
$containerFactory = new ContainerFactory(require 'settings.php');
$container = $containerFactory->createContainer();

// Get services
$basiqApi = $container->get('basiq.php.api.api');

// Fetch user
$user = $basiqApi->fetchUser($container->get('user_id'));
print_r($user);
```

### Introduction
The Basiq PHP API is a library designed to simplify interaction with the Basiq REST API. It provides a common and simple interface for retrieving banking data, building budget apps, tracking spending, and more. The library takes care of token management, is configurable, and offers a simplified HTTP client interface.

### Features
- **Token Management**: Automatic tracking and refreshing of the application bearer token.
- **Simplified HTTP Client**: Custom wrappers for Guzzle, providing simplified GET, POST, and request methods.
- **Authentication**: Supports both basic authentication (for token retrieval) and bearer token authentication.
- **Logging and Debugging**: Configurable logging using Monolog, with plans to separate it into a configurable service.
- **Exception Handling**: Custom exception class for handling Guzzle exceptions.
- **Dependency Injection**: Utilizes PHP-DI for managing services and dependencies.

### Components
- **API Interface**: Main interface for interacting with the Basiq API.
- **Bearer Token Manager**: Manages JWT tokens, including creation, refresh, and storage.
- **Guzzle Wrappers**: Custom wrappers for Guzzle, including factories for basic auth and bearer token auth.
- **HTTP Client Interface**: Defines a contract for HTTP clients, allowing for different implementations (e.g., CurlWrapper).

https://showme.redstarplugin.com/s/FyNnPzTp

[![](https://mermaid.ink/img/pako:eNqNkstuwjAQRX9l5BVI8ANZVMoLCvSlQiWkhMUoGYhFYkeOoxYh_r0TO12wQOrOnnPnXo_tqyh0SSIQJ4NtBbskVwBhFmtlUSoyB5jPnyDKwo_VYUCR28dZLiJCQ2anz6QgriUpmwsniZ0kyTx6RlXW7DOQxJGUm09kHZ5MYXQwhFZqNYNPOhrqKqlOo1_qupZDJHayCHtb-Tz4lrYCPhls6DKKl068YbH35XRIf1ppLpCgxTvLBasWsiaIsahoRAuHXv5lsGeVZ2N5_9jX38rKz_7VkZlMR7JyZM1kvX1_4_m7VquO_HSD8i9YzERDpkFZ8ntdh9Zc2Ioajgh4WaI55yJXN9Zhb_X2ogoRWNPTTPRtiZYSifzMzX0xLaXVRgRHrDsuktu--k_h_sbtF4Ptq-A?type=png)](https://mermaid.live/edit#pako:eNqNkstuwjAQRX9l5BVI8ANZVMoLCvSlQiWkhMUoGYhFYkeOoxYh_r0TO12wQOrOnnPnXo_tqyh0SSIQJ4NtBbskVwBhFmtlUSoyB5jPnyDKwo_VYUCR28dZLiJCQ2anz6QgriUpmwsniZ0kyTx6RlXW7DOQxJGUm09kHZ5MYXQwhFZqNYNPOhrqKqlOo1_qupZDJHayCHtb-Tz4lrYCPhls6DKKl068YbH35XRIf1ppLpCgxTvLBasWsiaIsahoRAuHXv5lsGeVZ2N5_9jX38rKz_7VkZlMR7JyZM1kvX1_4_m7VquO_HSD8i9YzERDpkFZ8ntdh9Zc2Ioajgh4WaI55yJXN9Zhb_X2ogoRWNPTTPRtiZYSifzMzX0xLaXVRgRHrDsuktu--k_h_sbtF4Ptq-A)

### Security Considerations
- Retrieves data from the sandbox using HTTPS.
- API keys are kept out of the repository and must be injected, usually via environment variables.

### Use Case Implementation
- Provides a common interface for integrating other PHP applications to retrieve banking data.
- Wraps Guzzle, simplifying the HTTP client interface and allowing for swapping out the lower-level HTTP client.
- Demonstrated implementation in a Symfony project, with potential for Drupal module integration.

### Future Considerations
- **Testing**: PHPUnit and static code analysis are planned for future development.
- **Hardening**: Open to customization and enhancements as the tool is further developed.

### Dependencies
- PHP >= 8.1
- PHP-DI ^7.0
- Monolog ^3.4
- GuzzleHttp ^7.7

### Conclusion
The Basiq PHP API is a robust and flexible library for integrating with the Basiq API. With features like automatic token management, simplified HTTP client interaction, and configurable logging, it provides a solid foundation for building financial applications.
