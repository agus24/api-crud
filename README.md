# This is my package api-crud

[![Latest Version on Packagist](https://img.shields.io/packagist/v/agus24/api-crud.svg?style=flat-square)](https://packagist.org/packages/agus24/api-crud)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/agus24/api-crud/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/agus24/api-crud/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/agus24/api-crud/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/agus24/api-crud/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/agus24/api-crud.svg?style=flat-square)](https://packagist.org/packages/agus24/api-crud)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require agus24/api-crud
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="api-crud-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="api-crud-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="api-crud-views"
```

## Usage

```php
$apiCrud = new ApiCrud\ApiCrud();
echo $apiCrud->echoPhrase('Hello, ApiCrud!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [gustiawan](https://github.com/agus24)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
