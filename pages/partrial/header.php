<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/24/20
 * Time: 2:39 AM
 */

$r = $_GET['act'];

if($r == false){
    echo " ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Files</title>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/headerStyle.css">
    <link rel="stylesheet" type="text/css" href="assets/w3.css">
    <!--<link rel="stylesheet" type="text/css" href="assets/css/material-dashboard.css">-->
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/popper.min.js"></script>
    <!--matrial icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .active, .btn:hover {
            background-color: #666;
            color: white;
        }
    </style>
</head>
<body>

<div class="content-container">
    <div class="row">
        <div class="col-12">
            <div class="header ">
                <a href="#default" class="logo">My Files</a>
                <div class="header-right" id="myDIV">
                    <?
                        if (isset($_SESSION['level'])){
                            if ($_SESSION['level']=='user') {
                                echo '<a  class="';
                                if($r == 'myFile'){echo 'active';}?>
                                <? echo '"href="index.php?act=myFile&&id='.$_SESSION['id_user'].'">Myfile</a>';

                                echo '<a  class="';
                                if($r == 'shortLink'){echo 'active';}?>
                                <? echo '"href="index.php?act=shortLink&&id='.$_SESSION['id_user'].'">Short link</a>';

                                echo '
                                    <a href="index.php?act=logout">logout</a>
                                ';
                            }
                        }else{
                            echo '<a  class="';
                            if($r == 'sementara'){echo 'active';}?>
                            <? echo '"href="index.php?act=sementara">Sementara</a>';

                            echo '<a  class="';
                            if($r == 'permanen'){echo 'active';}?>
                            <? echo '"href="index.php?act=permanen">Permanen</a>';

                            echo '<a  class="';
                            if($r == 'shortLink'){echo 'active';}?>
                            <? echo '"href="index.php?act=shortLink">Short link</a>';

                            echo '<a  class="';
                            if($r == 'login'){echo 'active';}?>
                            <? echo '"href="index.php?act=login">Login</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="" style="margin-top: 20px">
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
