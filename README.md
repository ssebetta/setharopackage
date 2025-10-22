### Setharo Laravel Client

Setharo is a Laravel client package for sending errors and system messages to the Setharo monitoring platform. It provides an easy way to integrate Setharo into your Laravel applications with **API** key authentication, custom logging, and helper/facade support.

📦 Installation

Require the package via Composer:

composer require setharo/setharo

Note: This package is stable (minimum-stability: dev with prefer-stable: true).

## Publish configuration

The configuration will be automatically merged, but you can publish it manually if needed:

php artisan vendor:publish --provider=*Setharo\SetharoServiceProvider* --tag=config

This will create config/setharo.php.

## Set environment variables

In your .env file, set the Setharo **URL** and **API** key:

SETHARO_URL=[https://app.setharo.com](https://app.setharo.com) SETHARO_API_KEY=your_api_key_here

⚡ Usage Using the Facade use Setharo\Facades\Setharo;

// Send an error
Setharo::sendError('Database connection failed', 'critical', [
    'file' => __FILE__,
    'line' => __LINE__,
]);

// Send a system message
Setharo::sendSystemMessage('New contact form submission', [
    'name' => 'John Doe',
    'email' => '[john@example.com](mailto:john@example.com)',
]);

Using the helper // Send an error setharo()->sendError('Database connection failed');

// Send a system message setharo()->sendSystemMessage('User signed up', ['user_id' => **123**]);

📝 Logging Integration

You can log errors to Setharo using Laravel’s logging system. In config/logging.php:

'channels' => [
    'setharo' => [
    'driver' => 'custom',
    'via' => Setharo\Logging\SetharoLogger::class,
    'level' => 'error',
    ],
],

Usage in Laravel:

Log::channel('setharo')->error('Something went wrong', [
    'user_id' => auth()->id(),
]);

💻 Integration Examples **PHP** Client $setharo = new SetharoClient();

// Send an error
$setharo->sendError('Database connection failed', 'critical', [
    'file' => __FILE__,
    'line' => __LINE__,
]);

// Send a system message
$setharo->sendSystemMessage('New contact form submission', [
    'name' => 'John Doe',
    'email' => '[john@example.com](mailto:john@example.com)',
]);

JavaScript Client const setharo = new SetharoClient();

// Send an error setharo.sendError('Database connection failed', 'error', { url: window.location.href });

// Send a system message
setharo.sendSystemMessage('New contact form submission', {
    name: 'John Doe',
    email: '[john@example.com](mailto:john@example.com)'
});

🔑 **API** Key Management

View and regenerate **API** keys from the System Settings Modal in the Setharo Dashboard.

Regenerating the key invalidates the old key immediately — update your applications to avoid breaking integrations.

🛠️ Helper Methods setharo()->sendError($content, $severity = 'error', $metadata = []); setharo()->sendSystemMessage($content, $metadata = []);

📁 File Structure
setharo/
├── composer.json
├── **README**.md
├── config/
│   └── setharo.php
├── helpers.php
├── src/
│   ├── Setharo.php
│   ├── Facades/Setharo.php
│   ├── Logging/SetharoLogger.php
│   └── SetharoServiceProvider.php
└── tests/
    └── ExampleTest.php

⚖️ License

**MIT** © Harold Peter Ssebetta