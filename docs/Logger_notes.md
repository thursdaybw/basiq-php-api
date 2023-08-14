Handlers are responsible for actually writing the log records to their respective destinations. Monolog comes with a variety of built-in handlers for different logging destinations like files, databases, email, etc.

Here's an example of how you might configure Monolog to log to a file and to the console, using the `StreamHandler` and `BrowserConsoleHandler`:

### 1. Configure Monolog in the Container Definition

```php
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Logger;

$builder->addDefinitions([
    Logger::class => function () {
        // Create a new Monolog logger instance
        $logger = new Logger('my_logger');

        // Add a handler to log to a file
        $logFile = __DIR__ . '/logs/app.log'; // Path to your log file
        $logger->pushHandler(new StreamHandler($logFile, Logger::DEBUG));

        // Add a handler to log to the browser console (useful for development)
        $logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));

        return $logger;
    },

    // ...
]);
```

### Notes:

- `StreamHandler`: This handler takes a file path and a log level. It will log messages at or above the specified level to the given file. In this example, it's logging all messages at the `DEBUG` level or higher to `app.log`.
- `BrowserConsoleHandler`: This handler logs messages to the browser's JavaScript console. It's handy for development, as you can see log messages directly in your browser's developer tools.
- You can add as many handlers as you like to a logger, and each one can have its own level and formatting settings.

Make sure the directory where the log file is located (`/logs` in this example) exists and is writable by the web server.

### 2. Use the Logger in Your Classes

With this configuration, the Monolog logger will be injected into any classes that implement the `LoggerAwareInterface`, and you can use it to log messages just like you would with any PSR-3 logger:

```php
$this->logger->info('This is an info message');
$this->logger->error('This is an error message', ['some' => 'context']);
```

These messages will be written to the specified log file and also to the browser console if you're using the `BrowserConsoleHandler`.

The cache needs to log if the cache file gets corrupted, if the json object is empty or something, and log if so.
Also the GuzzleWrapper has an existing @todo item to sort out it's logging and debug settings.

