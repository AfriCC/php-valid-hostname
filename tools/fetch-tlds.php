<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

$tlds = file('https://data.iana.org/TLD/tlds-alpha-by-domain.txt', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);

$tlds = array_filter($tlds, function($val) {
    return ! ($val{0} === '#');
});

$tlds = array_flip($tlds);
$tlds = array_change_key_case($tlds, CASE_LOWER);
$tlds = array_map(function() {
    return true;
}, $tlds);

var_export($tlds);
