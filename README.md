# Statamic Base

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mindtwo/statamic-base.svg?style=flat-square)](https://packagist.org/packages/mindtwo/statamic-base)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/mindtwo/statamic-base/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/mindtwo/statamic-base/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mindtwo/statamic-base.svg?style=flat-square)](https://packagist.org/packages/mindtwo/statamic-base)

Dashboard widgets and utilities for Statamic CMS.

## Requirements

- Statamic 5.x
- PHP 8.2+
- Laravel 11.x

## Installation

```bash
composer require mindtwo/statamic-base
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="statamic-base-config"
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="statamic-base-views"
```

## Features

- Customized dashboard with helpful widgets
- Enhanced admin interface utilities

## Usage

After installation, the dashboard widgets will be automatically available in your Statamic control panel.

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review our [security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [mindtwo GmbH](https://github.com/mindtwo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
