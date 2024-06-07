# elanak

## 📌 پێشکەوتن
Elanak پرۆژەیەکی بەرزە کە بۆ ناردنی پەیامەکانی ناوەڕۆکە لە ڕێگای چەندین خزمەتگوزاری جیاوازەوە دروستکراوە. ئەم پرۆژەیە بە زمانی بەرنامەنووسی PHP پێکهاتووە و لە API ـیە جیاوازەکان بۆ ناردنی پەیامەکانی ناوەڕۆکە بەکاردێنێت.

ئەم پرۆژەیە بۆ چوارچێوەی Laravel دروستکراوە و ئامانجی ئەوەیە بەرهەمهێنانی کارکردەیەکی باشتر لە بەرامبەر بەشداربوونەکانی تر و کۆگرتنی چەندین پانێڵ لە یەک مەخزەنێکدا.


## دامەزراندن و بەکارهێنان
بۆ دامەزراندن و بەکارهێنانی ئەم پرۆژەیە، فەرمانەکانی خوارەوە بەکاربێنە لە تێرمیناڵەکەتدا:

```bash
$ composer require morpheusadam/elanak
```

## بۆ سڕینەوەی پرۆژە، فەرمانی خوارەوە بەکاربێنە:


```bash
$ composer remove morpheusadam/elanak
```

### 📦 دامەزراندنی پاکەتە پێویستەکان:




```bash
composer require kavenegar/laravel
composer require melipayamak/laravel:1.0.0
composer require ippanel/php-rest-sdk
```
ئەم پاکەتەکانە 🛠️ تواناییە پێویستەکان بۆ ناردنی پەیامەکانی ناوەڕۆکە دەدات. تکایە فەرمانەکانی سەرەوە بەکاربێنە لە تێرمیناڵەکەتدا. 🖥️




### 📡 پشتیبانی لە سیستەمە جیاوازەکان:



### بەکارهێنانی پاکەت بۆ ناردنی پەیامەکانی ناوەڕۆکەی سادە:


```php
  Elanak::send($messages)->via($provider)->api($api)->from($sender)->to('09185312051')->dispatch();

```
### بەکارهێنانی پاکەت بۆ ناردنی پەیامەکانی ناوەڕۆکە بە شێوەیەکی پاترۆن:



ناردن لەگەڵ melipayamak

```php
Elanak::send($messages)->to($to)->via($providerName)->api($api)->pattern($patternCode, $value)->dispatch();
```
ناردن لەگەڵ Ippanel

```php
Elanak::send($messages)->to($to)->via($providerName)->api($api)->pattern($patternCode, $value)->from($sender)->dispatch();
```

 ### دەتوانی خزمەتگوزاری بگۆڕی بە گۆڕینی بەشەکە


 
```php
via('melipayamak') 
via('kavenegar')،
via('ippanel')،
via('payamresan')
via('smsir')
و غیره تغییر دهید.
```
## کۆدی نمونە بەکارهێنراو بۆ ناردنی زۆرینە


```php
via('melipayamak') 
via('kavenegar')،
via('ippanel')،
via('payamresan')
via('smsir')
and so on.
```

