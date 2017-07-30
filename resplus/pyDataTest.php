<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 30/07/2017
 * Time: 3:56 PM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
date_default_timezone_set("Australia/Brisbane");
$data = json_decode(file_get_contents("govData.json"));
print_r($data[1]);