# Laravel Pexels

Provides access to Pexels API for Laravel projects 

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Table of contents

* [Installation](#installation)
* [Using](#using)

## Installation

To get the latest version of `Laravel Pexels`, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require dedmytro/laravel-pexels
```

Or manually update `require` block of `composer.json` and run `composer update`.

```json
{
    "require": {
        "dedmytro/laravel-pexels": "^0.1"
    }
}
```

## Using
```php
use DeDmytro\Pexels\Clients\PhotoApiClient;
use DeDmytro\Pexels\Facades\Pexels;

$client = new PhotoApiClient(); // Good for controller method/artisan command handle()/job handle() dependency injection
// OR
$client = Pexels::photos(); 

$response = $client->search('cats');

foreach ($response->photos as $photo){
    $photo->width;
    $photo->height;
    $photo->url;
    $photo->src->medium;
}
```

[badge_downloads]:      https://img.shields.io/packagist/dt/dedmytro/laravel-pexels.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/dedmytro/laravel-pexels.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/dedmytro/laravel-pexels?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/dedmytro/laravel-pexels
