<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require 'vendor/autoload.php';

var_dump(AfriCC\Valid\hostname('', true, false, false, $errno));
var_dump($errno);