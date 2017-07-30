<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 29/07/2017
 * Time: 9:56 PM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
date_default_timezone_set("Australia/Brisbane");
$suburbName = $_GET["name"];
$suburbName = str_replace(" ","%20",$suburbName);
$getContent = file_get_contents("https://data.police.qld.gov.au/api/boundary?name=".$suburbName."&returngeometry=true&maxresults=1");
$obj = json_decode($getContent, true);
$tmpstr = $obj['Result'][0]['GeometryWKT'];
$tmpstr = substr($tmpstr,10,strlen($tmpstr)-12);
$myarray = explode(", ",$tmpstr);
$a = array();
foreach($myarray as $array){
    $tmp1 = explode(" ",$array);
    $array1 = array($tmp1[1],$tmp1[0]);
    array_push($a,$array1);
}
echo json_encode($a);