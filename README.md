# africc/valid-hostname

[![Build Status](https://travis-ci.com/AfriCC/php-valid-hostname.svg?branch=main)](https://travis-ci.org/AfriCC/php-valid-hostname)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AfriCC/php-valid-hostname/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/AfriCC/php-valid-hostname/?branch=main)
[![Coverage Status](https://coveralls.io/repos/github/AfriCC/php-valid-hostname/badge.svg?branch=main)](https://coveralls.io/github/AfriCC/php-valid-hostname?branch=main)
[![Latest Stable Version](https://poser.pugx.org/africc/valid-hostname/v/stable.svg)](https://packagist.org/packages/africc/valid-hostname)
[![Packagist](https://img.shields.io/packagist/dt/africc/valid-hostname.svg)](https://packagist.org/packages/africc/valid-hostname)
[![Latest Unstable Version](https://poser.pugx.org/africc/valid-hostname/v/unstable.svg)](https://packagist.org/packages/africc/valid-hostname)
[![License](https://poser.pugx.org/africc/valid-hostname/license.svg)](https://packagist.org/packages/africc/valid-hostname)

A simple (but real) hostname validator in PHP.

## Install

```bash
$ composer require africc/valid-hostname
```

## Usage

```php
<?php

require 'vendor/autoload.php';

if (AfriCC\Valid\hostname('google.com')) {
    echo 'valid!';
}
```

## License

Licensed under the MIT License. See the [LICENSE file](LICENSE) for details.

## Author Information

[AfriCC](https://afri.cc)
