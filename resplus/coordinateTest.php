<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 29/07/2017
 * Time: 6:08 PM
 */

    class Coordination{
        var $lat;
        var $lng;
        function setCoordination($latitude,$longitude){
            $this->lat = $latitude;
            $this->lng = $longitude;
        }
    }
?>