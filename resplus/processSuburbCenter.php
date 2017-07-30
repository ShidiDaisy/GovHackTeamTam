<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 30/07/2017
 * Time: 11:01 AM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
date_default_timezone_set("Australia/Brisbane");
$content = file_get_contents("govData.json");
$locArray = json_decode($content);
$suburbs = array();
for ($i=0;$i<sizeof($locArray);$i++){
    $s = new Suburb();
    $item = $locArray[$i];
    $s->name = $item["Suburb"];
    $s->polygon = json_decode(file_get_contents("http://localhost/resplus/suburbCoordination.php?name=".$s->name));
    $s->center = getCenter($s->polygon);
    array_push($suburbs,$s);
}
echo json_encode($suburbs);
function getCenter($polygon) {
    $totalArea = 0;
    $totalX = 0;
    $totalY = 0;
    $points = $polygon;
    for ($i = 0; $i < sizeof($points)-1; ++$i) {
        $a = $points[$i + 1];
        $b = $points[$i];
        $area = 0.5 * ($a[0] * $b[1] - $b[0] * $a[1]);
        $x = ($a[0] + $b[0]) / 3;
        $y = ($a[1] + $b[1]) / 3;
        $totalArea += $area;
        $totalX += $area * $x;
        $totalY += $area * $y;
    }
    return [$totalX / $totalArea, $totalY/ $totalArea];
}
class Suburb{
    var $name;
    var $polygon;
    var $center;
}