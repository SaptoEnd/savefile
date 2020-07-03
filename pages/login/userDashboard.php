<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/24/20
 * Time: 9:20 PM
 */

$getIdUser = $_GET['id'];
$_SESSION['id_user'];
$getData = new ConfigFile($con);
$data = $getData->viewDataUserId($getIdUser);

?>

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 0px 0px;
    }

    .title {
        width: 65px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        position: center;
        margin-left: 20px;
    }

    .footer .btn.btn-success{
        display: block;
        margin-left: auto;
        margin-right: 12px;
    }

</style>


<div class="row">
    <span class="col-md-12 card-header">File anda</span>
    <?
        include "pages/login/tambahFile.php";
    ?>

        <div class="col-12 card-body w3-panel w3-border">
            <table style="padding: unset; margin-bottom: 15px;">
                <div class="row">
                    <ul class=' '>
                        <?php
                        //bata paging
                        $kolom=8; //batas data yang dikeluarkan
                        $i= 0; //variabel variabel
                        while($d=mysqli_fetch_array($data)){
                            if ($i >= $kolom){ //jika $kolom =4; terpenuhi maka
                                echo "<tr></tr>"; // <tr> akan pindah halam bawahnya
                                $i=0; //
                            }
                            $i++;
                            ?>
                            <td style="padding: 6px">

                                <!--<div class="card" style="width: 200px; height:100%; border: 1px">
                                    <div class="" style="margin:3px; height:30px">
                                        <div style="font-size: small;"></div>
                                    </div>

                                </div>-->

                                <div class="card" style="width:100px; height:100px">
                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" style="width: 100%; height: 60%">
                                    <div class="container">
                                        <div class="row">
                                            <p class="title" align="center" style="font-size: small">Architect & Engineer</p>
                                            <div class="dropdown dropleft float-right">
                                                <a type="button" class="" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Unduh</a>
                                                    <a class="dropdown-item" href="#">Berbagi</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                            <?
                        }?>
                    </ul>
                </div>


            </table>
        </div>
    </div>



<!--dopdown togle-->
<script src="assets/bootstrap.min2.js"></script>