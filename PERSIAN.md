# elanak

## 📌 معرفی
Elanak یک پروژه برجسته است که با هدف ارسال پیامک از طریق چندین سرویس دهنده متفاوت طراحی شده است. این پروژه با استفاده از زبان برنامه نویسی PHP پیاده سازی شده و از API های مختلف برای ارسال پیامک استفاده می‌کند.

این پروژه برای فریمورک لاراول ساخته شده است و هدف از آن ارائه پرفورمنس بهتر نسبت به سایر رپوزیتوری ها و جمع آوری چندین پنل در یک مخزن است.


## 🔧 نصب و استفاده
برای نصب و استفاده از این پروژه، دستورات زیر را در ترمینال خود اجرا کنید:

```bash
$ composer require morpheusadam/elanak
```

## برای حذف پروژه، دستور زیر را اجرا کنید:
```bash
$ composer remove morpheusadam/elanak
```

### 📦 نصب بسته‌های مورد نیاز:



```bash
composer require kavenegar/laravel
composer require melipayamak/laravel:1.0.0
composer require ippanel/php-rest-sdk
```
این بسته‌ها 🛠️ امکانات مورد نیاز برای ارسال پیامک را فراهم می‌کنند. لطفا دستورات فوق را در ترمینال خود اجرا کنید. 🖥️





### 📡 پشتیبانی از سامانه‌های مختلف:


کاوه نگار
ملی پیامک
ایپی پنل
اسمس دات آی آر
پیام رسان
نصب و راه اندازی
برای نصب و راه اندازی این پروژه، ابتدا باید مخزن را کلون کنید:

 


### استفاده از پکیج برای ارسال پیامک ساده:

```php
  Elanak::send($messages)->via($provider)->api($api)->from($sender)->to('09185312051')->dispatch();

```
### استفاده از پکیج برای ارسال پیامک با پترن:

ارسال با ملی پیامک
```php
Elanak::send($messages)->to($to)->via($providerName)->api($api)->pattern($patternCode, $value)->dispatch();
```
ارسال با ملی ippanel
```php
Elanak::send($messages)->to($to)->via($providerName)->api($api)->pattern($patternCode, $value)->from($sender)->dispatch();
```

 ### می توانید سرویس دهنده را با تغییر قسمت 
 
```php
via('melipayamak') 
via('kavenegar')،
via('ippanel')،
via('payamresan')
via('smsir')
و غیره تغییر دهید.
```
## نمونه کد استفاده شده برای ارسال بهینه

```php
via('melipayamak') 
via('kavenegar')،
via('ippanel')،
via('payamresan')
via('smsir')
و غیره تغییر دهید.
```

