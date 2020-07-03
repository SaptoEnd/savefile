<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/24/20
 * Time: 12:47 AM
 */



$con = mysqli_connect("localhost","root","","files");
//$con = mysqli_connect("localhost","root","","skrip"); //database coba
if(!$con){
    echo " Error : tidak ada sambungan ke mysql". PHP_EOL;
    echo " debugging erno".mysqli_connect_error().PHP_EOL;
    exit();
}


?>