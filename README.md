# Yuppim API v1 PHP SDK

It is an official PHP SDK for Yuppim PHP API v1.

## Getting started

In order to use this library you need to have at least PHP 7.0 version.

There are two ways to use Yuppim PHP SDK:

##### Use [Composer](https://getcomposer.org/)


You will need to download Yuppim PHP SDK using Composer:

```
composer require alekseon/yuppim-api-v1-php-sdk
```
If you are not familiar with Composer, learn about it [here](https://getcomposer.org/doc/01-basic-usage.md).


## Usage examples

In the given example you will see how to initiate selected API and a actions which are available:

- Get single product by ID
- Get array of products

```php
// get single product
$productApi = (new \YuppimApi\Yuppim('your-token'))->product();
$productApi->get($productId);

// get all of products, deafult limit is 100 products in one response
$productsApi = (new \YuppimApi\Yuppim('your-token'))->products();
$productsApi->get();

// get products with pagination
$productsApi = (new \YuppimApi\Yuppim('your-token'))->products();
$productsApi->setLimit($limit);
$productsApi->setPage($page);
$productsApi->get();

// get products filtered
$productsApi = (new \YuppimApi\Yuppim('your-token'))->products();
$productsApi->addFilter($field, $operator, $value);
$productsApi->get();
```

### Product filters

Fields allowed to filter are:
- Nazwa
- Cena_obowiazuje_od
- Data_dodania
- Data_modyfikacji
- Producent
- Dostawca

The supported operators are:
- "="
- ">"
- "<"
- "!="
- "IN"

Note: Not all operators are available for all reference fileds. 


```php
// get products filtered example
$productsApi = (new \YuppimApi\Yuppim('your-token'))->products();
$productsApi->addFilter('Data_dodania', '>', '2020-01-01 00:00:00');
$productsApi->addFilter('Dostawca', 'IN', ['Dostawca_X', 'Dostawca_Y']);
$productsApi->get();
```

## Support and Feedback

In case you find any bugs, submit an issue directly here in GitHub.


