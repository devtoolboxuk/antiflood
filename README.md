# AntiFlood
AntiFlood Service

[![Build Status](https://api.travis-ci.org/devtoolboxuk/antiflood.svg?branch=master)](https://travis-ci.org/devtoolboxuk/antiflood)
[![Coveralls](https://coveralls.io/repos/github/devtoolboxuk/antiflood/badge.svg?branch=master)](https://coveralls.io/github/devtoolboxuk/antiflood?branch=master)
[![CodeCov](https://codecov.io/gh/devtoolboxuk/antiflood/branch/master/graph/badge.svg)](https://codecov.io/gh/devtoolboxuk/antiflood)


## Table of Contents

- [Background](#Background)
- [Usage](#Usage)
- [Maintainers](#Maintainers)
- [License](#License)

## Background

Can be used to prevent multiple submissions of forms. But to be used along side CSRF protection

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

$this->antiFloodService = new AntiFloodService();
```


##### Set AntiFlood Delay
By default, this is preset to 60 seconds.
```sh
$this->antiFloodService->setAntiFloodDelay('30');
```

##### Get AntiFlood Delay
```sh 
$this->antiFloodService->getAntiFloodDelay();
```

##### Detect AntiFlood

Returns a boolean if the AntiFlood item is set

```sh
$this->antiFloodService->detectAntiFlood()
```


## Maintainers

[@DevToolboxUk](https://github.com/DevToolBoxUk).


## License

[MIT](LICENSE) © DevToolboxUK