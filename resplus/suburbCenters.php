<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 29/07/2017
 * Time: 9:57 PM
 */

function getCentroid($polygon) {
  $totalArea = 0;
  $totalX = 0;
  $totalY = 0;
  $points = $polygon[0];
  for ($i = 0; $i < $points->length; ++$i) {
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