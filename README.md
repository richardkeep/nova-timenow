# Nova Time Now

[![Latest Version on Packagist](https://img.shields.io/packagist/v/richardkeep/nova-timenow.svg?style=flat-square)](https://packagist.org/packages/richardkeep/nova-timenow)
[![Style CI](https://styleci.io/repos/148930957/shield?branch=master)](https://styleci.io/repos/148930957)
[![Total Downloads](https://img.shields.io/packagist/dt/richardkeep/nova-timenow.svg?style=flat-square)](https://packagist.org/packages/richardkeep/nova-timenow)

A Laravel Nova card to display the current time from different timezones in the world.

![screenshot of the timenow card](https://user-images.githubusercontent.com/3874381/164247140-6f5dfbdd-e7fe-420c-84d5-b287bb0a3561.png)

| Version | L5.6 | L5.7 | L5.8 | L6  | L7  | L8  | L9  |
| ------- | ---- | ---- | ---- | --- | --- | --- | --- |
| 1.\*    | ✅   | ✅   | ✅   | ✅  | ✅  | ✅  | ✗   |
| 2.\*    | ✗    | ✗    | ✗    | ✗   | ✗   | ✗   | ✅  |

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require richardkeep/nova-timenow
```

Next up, you must register the tool with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvder.php

// ...

public function cards()
{
    return [
        // ...
        new \Richardkeep\NovaTimenow\NovaTimenow,
    ];
}
```

## Customization

By default, the system's timezone and America\Mexico_City will be used as the list of timezones. To override this, please add more [valid timezones](https://momentjs.com/timezone/).

```php

public function cards()
{
    return [
        // ...
        (new \Richardkeep\NovaTimenow\NovaTimenow)->timezones([
            'Africa/Nairobi',
            'America/Mexico_City',
            'Australia/Sydney',
            'Europe/Paris',
            'Asia/Tokyo',
        ])->defaultTimezone('Africa/Nairobi'),
    ];
}
```

## Usage

The card will be automatically displayed on the dashboard. You can now select the timezone from the dropdown list of registered timezones to view the current time in that region,
