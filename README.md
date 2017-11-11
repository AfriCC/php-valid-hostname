[![Build Status](https://travis-ci.org/AfriCC/php-valid-hostname.svg?branch=master)](https://travis-ci.org/AfriCC/php-valid-hostname)

# africc/valid-hostname

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
