# Laravel Health
Open API endpoints to show vital information about your Laravel application.

## Requirements
- Laravel 10 or higher
- PHP 8.3 or higher
- Linux based operating system _(others are untested)_

## Installation
You can install the package via composer:
```bash
composer require webduonederland/laravel-health
```

After installing the package, you need to add the following variable to your Laravel application's `.env` file:
```
LARAVEL_HEALTH_API_KEY="your-api-key"
```

## Credits
- [Laravel Pulse](https://github.com/laravel/pulse) - The MemoryRetriever.php is using the same method of retrieving RAM usage as Pulse is