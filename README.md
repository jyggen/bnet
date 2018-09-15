# Battle.net API Client

[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][release]
[![Software License][badge-license]][license]
[![Build Status][badge-build]][build]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

boo/bnet is a PHP 7.1+ library for working with the Battle.net APIs.

## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run
the following command to install the package and add it as a requirement to your
project's `composer.json`:

```bash
composer require boo/bnet
```

## Usage

### API

The boo/bnet library is able to generate [PSR-7][] requests for all Battle.net
API endpoints. In order to do so, a request factory implementing [PSR-17][], as
well as a [PSR-7][] compatible HTTP client, is required. The example below uses
[http-interop/http-factory-guzzle][] and [guzzlehttp/guzzle][], but any
[PSR-17][] implementation and [PSR-7][] compatible HTTP client will work.

```php
use Boo\BattleNet\Apis\Warcraft\CharacterProfileApi;
use Boo\BattleNet\Regions\EU;
use GuzzleHttp\Client;
use Http\Factory\Guzzle\RequestFactory;

$api = new CharacterProfileApi(
    new RequestFactory(), // Implementation of PSR-17
    new EU(), // API region
    '3797fb20f11da97fbc5fc9335247883c' // API key
);

$request = $api->getCharacterProfile('Draenor', 'Jyggen');
$client = new Client(); // PSR-7 compatible HTTP client
$response = $client->send($request);

var_dump($response);
```

### OAuth 2.0

The boo/bnet library ships with a provider for [league/oauth2-client][].

```php
use Boo\BattleNet\OAuth2\BattleNetProvider;

$provider = new BattleNetProvider([
    'clientId' => '3797fb20f11da97fbc5fc9335247883c',
    'clientSecret' => '7daf46a2c8a780582c6e46e71e5158fd',
    'redirectUri' => 'https://localhost/oauth',
    'region' => new EU(),
]);
```

## Copyright and License

The boo/bnet library is copyright © [Jonas Stendahl](https://stendahl.me/) and
licensed for use under the MIT License (MIT). Please see [LICENSE][] for more
information.

[packagist]: https://packagist.org/packages/boo/bnet
[composer]: http://getcomposer.org/
[psr-7]: https://www.php-fig.org/psr/psr-7/
[psr-17]: https://www.php-fig.org/psr/psr-17/
[http-interop/http-factory-guzzle]: https://packagist.org/packages/http-interop/http-factory-guzzle
[guzzlehttp/guzzle]: https://packagist.org/packages/guzzlehttp/guzzle
[league/oauth2-client]: https://packagist.org/packages/league/oauth2-client

[badge-source]: https://img.shields.io/badge/source-boo/bnet-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/packagist/v/boo/bnet.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/jyggen/bnet/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coveralls/jyggen/bnet/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/boo/bnet.svg?style=flat-square

[source]: https://github.com/jyggen/bnet
[release]: https://packagist.org/packages/boo/bnet
[license]: https://github.com/jyggen/bnet/blob/master/LICENSE
[build]: https://travis-ci.org/jyggen/bnet
[coverage]: https://coveralls.io/r/jyggen/bnet?branch=master
[downloads]: https://packagist.org/packages/boo/bnet
