<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/27/20
 * Time: 12:38 AM
 */

if ($_POST){
    $pas = $_POST['password_php'];
    $log  =New Login($con);
    $log->loginDirect($pas);
//die($log);
}

?>

<div class="row">
    <div class="col-4"></div>

    <div class="col-4">
        <div class="container">
            <div class="row">
                    <h5> Form login</h5>
                <div class="card" style="padding: 10px">
                    <div class="col-12" >
                        <form class="" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group" >
                                    <div class="label">Password</div>
                                    <input class="form-control" type="text" name="password_php" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group" align="right">
                                    <button class="btn btn-success">login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-4"></div>
</div>
