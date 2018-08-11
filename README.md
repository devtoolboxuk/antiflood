# AntiFlood
AntiFlood Service

[![Build Status](https://api.travis-ci.org/devtoolboxuk/hashing.svg?branch=master)](https://travis-ci.org/devtoolboxuk/hashing)
[![Coveralls](https://coveralls.io/repos/github/devtoolboxuk/hashing/badge.svg?branch=master)](https://coveralls.io/github/devtoolboxuk/hashing?branch=master)
[![CodeCov](https://codecov.io/gh/devtoolboxuk/hashing/branch/master/graph/badge.svg)](https://codecov.io/gh/devtoolboxuk/hashing)


## Table of Contents

- [Background](#Background)
- [Usage](#Usage)
- [Maintainers](#Maintainers)
- [License](#License)

## Background

Although there are many hashing services out there, I decided to create a basic one for use on some of my projects.

The Unit Tests have been run on PHP 5.4 and 7.2. This is to help support legacy projects.

## Usage

Usage of the hashing service

```sh
$ composer require devtoolboxuk/anitflood
```

Then include Composer's generated vendor/autoload.php to enable autoloading:

```sh
require 'vendor/autoload.php';
```

```sh
use devtoolboxuk/antiflood;

$this->antiFlood = new AntiFlood();
```


##### Set Hashing Key
```sh
$this->hashingService->setHashingKey($key);
```

##### Get Hashing key
```sh 
$this->hashingKey = $this->hashingService->getHashingKey();
```

##### Hashing Data
Pass in the data to be hashed.
```sh
$this->hashingService->hash("Test Data");
```

##### Get Hashed Data
Returns the hash of the data.
```sh
$this->hashingService->getHashedData()
```


By default, the Hashing service uses the SHA256 Algoritm, and the HMAC Hashing Function

##### Retrieve Hashed Data
```sh
$this->hashingService->setHashingKey($key);
$this->hashingKey = $this->hashingService->getHashingKey();
```

The algorithm for hashing can be changed using this function, currently only the following algorithms are supported; 'sha256', 'sha384', 'sha512', 'md5'

##### Set Algorithm
```sh
$this->hashingService->setHashingKey($key);
$this->hashingKey = $this->hashingService->getHashingKey();
```

The hashing function can also be changed to use either hmac or not (others may come along...)

##### Set Hashing Function
```sh
$this->hashingService->setHashFunction('hmac');
```

## Maintainers

[@DevToolboxUk](https://github.com/DevToolBoxUk).


## License

[MIT](LICENSE) © DevToolboxUK