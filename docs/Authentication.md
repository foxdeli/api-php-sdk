# Authorization

Foxdeli API SDK makes Authorization easy. 

It's required to initialize library over `init()` call.

Before every request it checks JWT tokens and their time validity. 
If not valid it try to reauthorize or authorize.

Authentication and Refresh Token can be called directly, but it shouldn't be necessary.

## Initiation

First step for using Foxdeli API PHP SDK is initialize library.

```php
$foxdeli = Foxdeli\ApiPhpSdk\Foxdeli::init("username", "password");
```

## Authentication

Authorization can be used next to obtain access & refresh tokens.

```php
$foxdeli->authorize();
```

## Refresh Token

For refreshing access token can be called 

```php
$foxdeli->refreshToken();
```

## Exception

When call for Authentication or Refresh Token fail it return `\Foxdeli\ApiPhpSdk\ApiException`

```php
$foxdeli = Foxdeli\ApiPhpSdk\Foxdeli::init("username", "password");
try {
    $foxdeli->authorize();
    $foxdeli->refreshToken();
} catch (\Foxdeli\ApiPhpSdk\ApiException $e) {
    echo 'Exception with status code: '. $e->getCode(), PHP_EOL;
    echo 'With more detail in '. $e->getResponseBody(), PHP_EOL;
}
```