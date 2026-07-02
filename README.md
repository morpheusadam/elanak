<div align="center">

# 📨 Elanak — Unified Laravel SMS Sender

### One fluent Laravel/PHP interface to send SMS through multiple providers — Kavenegar, Melipayamak, IPPanel, SMS.ir and Payamresan — consolidating every panel into a single repository.

<p>
  <img src="https://img.shields.io/github/license/morpheusadam/elanak?style=for-the-badge&color=4c1" alt="License" />
  <img src="https://img.shields.io/github/stars/morpheusadam/elanak?style=for-the-badge&color=ffca28" alt="Stars" />
  <img src="https://img.shields.io/github/forks/morpheusadam/elanak?style=for-the-badge&color=42a5f5" alt="Forks" />
  <img src="https://img.shields.io/github/last-commit/morpheusadam/elanak?style=for-the-badge&color=8e44ad" alt="Last commit" />
  <img src="https://img.shields.io/github/repo-size/morpheusadam/elanak?style=for-the-badge&color=e67e22" alt="Repo size" />
</p>

<p>
  <img src="https://img.shields.io/badge/PHP-Library-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/Laravel-Package-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" />
  <img src="https://img.shields.io/badge/Composer-Install-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer" />
  <img src="https://img.shields.io/badge/SMS%20Gateways-5-2EA44F?style=for-the-badge" alt="5 SMS gateways" />
</p>

</div>

---

## 📖 Overview

**Elanak** is a robust **Laravel SMS package** that sends text messages through **multiple SMS service providers** behind one consistent, fluent interface. Rather than juggling a separate SDK and a separate panel for every provider, Elanak **consolidates all of them into a single repository** — so you can switch gateways by changing one method call, with no rewrite of your sending logic.

Built for the **Laravel framework** (with a service provider and `Elanak` facade for auto-discovery), it aims for better ergonomics and performance than scattering several SMS libraries across a project. It supports both **simple text messages** and **pattern / template-based** messages (OTP, verification codes, transactional notifications), making it ideal for **authentication, alerts, and notification workflows**.

> 🔎 **Keywords:** Laravel SMS, PHP SMS package, send SMS Laravel, SMS gateway Laravel, Kavenegar Laravel, Melipayamak, IPPanel, SMS.ir, Payamresan, OTP SMS, pattern SMS, multi-provider SMS sender.

---

## ✨ Features

- 📡 **Multiple providers, one API** — swap gateways with a single `via()` call.
- 🧩 **Fluent builder** — chainable `send()->via()->api()->from()->to()->dispatch()` syntax.
- 🔢 **Pattern / template messages** — send OTP and templated SMS with `pattern($code, $values)`.
- 🧱 **Laravel-native** — auto-registered service provider and `Elanak` facade.
- 🗂️ **Panels consolidated** — every supported SMS panel lives in one repository.
- 🪶 **Lightweight** — a thin, focused wrapper over each provider's API.

---

## 🏢 Supported SMS Providers

The following gateways are implemented under `src/Getways/`:

| Provider | Driver name |
| --- | --- |
| **Kavenegar** | `kavenegar` |
| **Melipayamak** | `melipayamak` |
| **IPPanel** | `ippanel` |
| **SMS.ir** | `smsir` |
| **Payamresan** | `payamresan` |

---

## 🛠️ Tech Stack

| Component | Technology |
| --- | --- |
| Language | **PHP** |
| Framework | **Laravel** (service provider + `Elanak` facade) |
| Install | **Composer** (PSR-4: `Morpheusadam\Elanak\`) |

<p>
  <img src="https://skillicons.dev/icons?i=php,laravel" alt="Tech stack" />
</p>

---

## 🚀 Getting Started

### Install the package

```bash
composer require morpheusadam/elanak
```

### Install the provider SDKs you intend to use

```bash
composer require kavenegar/laravel
composer require melipayamak/laravel:1.0.0
composer require ippanel/php-rest-sdk
```

To remove Elanak later:

```bash
composer remove morpheusadam/elanak
```

---

## 📦 Usage

### Send a simple text message

```php
Elanak::send($messages)
    ->via($provider)   // e.g. 'kavenegar', 'melipayamak', 'ippanel', 'smsir', 'payamresan'
    ->api($api)
    ->from($sender)
    ->to('09185312051')
    ->dispatch();
```

### Send a pattern / template message

**Melipayamak**

```php
Elanak::send($messages)
    ->to($to)
    ->via($providerName)
    ->api($api)
    ->pattern($patternCode, $value)
    ->dispatch();
```

**IPPanel**

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

Change the provider simply by changing the `via()` argument:

```php
->via('melipayamak')
->via('kavenegar')
->via('ippanel')
->via('payamresan')
->via('smsir')
```

---

## 🤝 Contributing

Contributions are welcome! Open an [issue](https://github.com/morpheusadam/elanak/issues) or submit a pull request to add a provider, fix a bug, or improve the documentation.

## 📜 License

Distributed under the **MIT License**. See the [`LICENSE`](LICENSE) file for full terms.

---

<div align="center">

### 👤 Author — Morpheus Adam

Web developer & cheerful hacker · PHP · Laravel · Go

<p>
  <a href="https://github.com/morpheusadam"><img src="https://img.shields.io/badge/GitHub-morpheusadam-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub" /></a>
  <a href="https://sam.zeonic.me"><img src="https://img.shields.io/badge/Website-sam.zeonic.me-4c1?style=for-the-badge&logo=googlechrome&logoColor=white" alt="Website" /></a>
  <a href="mailto:morpheusadam95@gmail.com"><img src="https://img.shields.io/badge/Email-Contact-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Email" /></a>
</p>

⭐ **If Elanak made SMS easier in your project, consider giving it a star!** ⭐

</div>


---

## ⭐ Star History

<a href="https://star-history.com/#morpheusadam/elanak&Date">
  <img src="https://api.star-history.com/svg?repos=morpheusadam/elanak&type=Date" alt="elanak — Star History Chart" width="70%" />
</a>

<div align="center">

### If this project helps you, please give it a ⭐

A star helps other developers discover **elanak** and supports continued development.

</div>
