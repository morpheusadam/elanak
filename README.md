# SMS Forge

SMS Forge (package name `Elanak`) is a Laravel package that sends SMS through several Iranian SMS providers behind one fluent interface, for PHP developers who would otherwise integrate each provider's SDK separately.

## Overview

Rather than installing a separate SDK and writing separate sending code for every SMS panel, SMS Forge wraps them in a single API. Switching gateway means changing the argument to one `via()` call; the rest of the sending logic stays the same.

The package registers a service provider and an `Elanak` facade for Laravel auto-discovery. It supports plain text messages as well as pattern/template messages, which is what the providers use for OTP codes and other transactional notifications.

## Supported providers

Gateways are implemented under `src/Getways/`.

| Provider | Driver name |
| --- | --- |
| Kavenegar | `kavenegar` |
| Melipayamak | `melipayamak` |
| IPPanel | `ippanel` |
| SMS.ir | `smsir` |
| Payamresan | `payamresan` |

## Requirements

- PHP with Composer
- Laravel (service provider and facade are auto-discovered)
- PSR-4 namespace: `Morpheusadam\Elanak\`

## Installation

Install the package:

```bash
composer require morpheusadam/SmsForge
```

Install the SDKs for the providers you intend to use:

```bash
composer require kavenegar/laravel
composer require melipayamak/laravel:1.0.0
composer require ippanel/php-rest-sdk
```

To remove the package:

```bash
composer remove morpheusadam/SmsForge
```

## Usage

### Send a text message

```php
Elanak::send($messages)
    ->via($provider)   // 'kavenegar', 'melipayamak', 'ippanel', 'smsir', 'payamresan'
    ->api($api)
    ->from($sender)
    ->to('09185312051')
    ->dispatch();
```

### Send a pattern/template message

Melipayamak:

```php
Elanak::send($messages)
    ->to($to)
    ->via($providerName)
    ->api($api)
    ->pattern($patternCode, $value)
    ->dispatch();
```

IPPanel:

```php
Elanak::send($messages)
    ->to($to)
    ->via($providerName)
    ->api($api)
    ->pattern($patternCode, $value)
    ->from($sender)
    ->dispatch();
```

### Switch provider

Change the argument passed to `via()`:

```php
->via('melipayamak')
->via('kavenegar')
->via('ippanel')
->via('payamresan')
->via('smsir')
```

## Contributing

Open an [issue](https://github.com/morpheusadam/SmsForge/issues) or submit a pull request to add a provider, fix a bug, or improve the documentation.

## License

MIT. See [`LICENSE`](LICENSE) for the full terms.

## Author

Morpheus Adam — [GitHub](https://github.com/morpheusadam) · [sam.zeonic.me](https://sam.zeonic.me) · morpheusadam95@gmail.com
