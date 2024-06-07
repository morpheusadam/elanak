# elanak

## 📌 Introduction
Elanak is a prominent project designed to send text messages via multiple different service providers. This project is implemented using the PHP programming language and uses various APIs to send text messages.

This project is built for the Laravel framework and its goal is to provide better performance compared to other repositories and to collect multiple panels in one repository.


## Installation and Usage
To install and use this project, run the following commands in your terminal:

```bash
$ composer require morpheusadam/elanak
```

## To remove the project, run the following command:

```bash
$ composer remove morpheusadam/elanak
```

### 📦 Installing Required Packages:



```bash
composer require kavenegar/laravel
composer require melipayamak/laravel:1.0.0
composer require ippanel/php-rest-sdk
```
These packages 🛠️ provide the necessary capabilities for sending text messages. Please run the above commands in your terminal. 🖥️




### 📡 پشتیبانی از سامانه‌های مختلف:


### Using the Package to Send Simple Text Messages:

```php
  Elanak::send($messages)->via($provider)->api($api)->from($sender)->to('09185312051')->dispatch();

```
### Using the Package to Send Text Messages with a Pattern:


Sending with melipayamak 
```php
Elanak::send($messages)->to($to)->via($providerName)->api($api)->pattern($patternCode, $value)->dispatch();
```
Sending with Ippanel
```php
Elanak::send($messages)->to($to)->via($providerName)->api($api)->pattern($patternCode, $value)->from($sender)->dispatch();
```

 ### You can change the service provider by changing the section

 
```php
via('melipayamak') 
via('kavenegar')،
via('ippanel')،
via('payamresan')
via('smsir')
و غیره تغییر دهید.
```
## Sample Code Used for Optimal Sending

```php
via('melipayamak') 
via('kavenegar')،
via('ippanel')،
via('payamresan')
via('smsir')
and so on.
```

