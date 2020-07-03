<?php

$files = new ConfigFile($con);
$vewc= $files->v_cod();
//echo $vewc;

if ($_POST){

    //Input Akun Password
    $password = $_POST['password_php'];
    //$password = 1;
    $password_txt = $_POST['text_password_php'];
    $idUser = $password;

    $fileName="";
    $target_dir = "file/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }


    $target_file = $target_dir . $_FILES['file']['name'];
    $uploadOk = 1;
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);


/*    if($FileType != "pdf" && $FileType !="txt") {
        echo '<script>
                            alert(" Gagal Upload, File Upload harus PDF");
                        </script>';
        $uploadOk = 0;
    }*/

    $ukuran_file   = $_FILES["file"]["size"];
    $max = 50000000; //50Mb

    if ($ukuran_file > $max){
        echo '<script>
                            alert(" Gagal Upload, Ukuran file terlalu besar");
                        </script>';
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";↵
    // if everything is ok, try to upload file
    } else {
        $uploadFile = $_FILES['file'];
        // Extract nama file
        $extractFile = pathinfo($uploadFile['name']);
        $sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
        $handle = opendir($target_dir);
        while(false !== ($file = readdir($handle))){ // Looping isi file pada directory tujuan
            // Apabila ada file dengan awalan yg sama dengan nama file di uplaod
            if(strpos($file,$extractFile['filename']) !== false)
                $sameName++; // Tambah data file yang sama
        }
        $tgl=date('Y-m-d');
        $newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];

        if(move_uploaded_file($uploadFile['tmp_name'],$target_dir.$newName)){
            $fileSize = $target_dir.$newName;
            $fileSize = round(filesize($fileSize)); //UKURAN FILE
            if ($uploadOk == 1) {
                $namaFile=$newName;
                $jenis = "0"; //0 = sementara
                $files->uploadFile($idUser,$namaFile,$jenis);

                $files->inputScode($idUser);

                //Input Akun Password
                $passwordAll = $password.$password_txt;
                $level = 'user';
                $files->inputAkun($idUser,$passwordAll,$level);
                //$files->uploadFile($fileName,$tgl);
                echo '<script type="text/javascript"> window.location="index.php?act=loginDirect&&id='.$passwordAll.'"</script>';
                //header("Refresh:0");
                //echo 'File berhasil diupload dengan nama: ' . $newName;
            }else{

                echo 'File gagal diupload';
            }

            echo 'File berhasil diupload dengan nama: ' . $newName;
        }
        else{
            echo 'File gagal diupload';
        }
    }
    header("Refresh:0");
}



?>

                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="row" >
                                            <div class="col-md-12">

                                                <div class="card">
                                                    <div class="card-header card-header-primary">
                                                        <h4 class="card-title">Upload File  </h4>
                                                        <!-- <p class="card-category"> Upload Tugas Akhir Bab 1 s/d Bab 5</p>-->
                                                    </div>

                                                    <div class="card-body" style="">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="file" class="small" name="file"  required/>
                                                            <br/>
                                                            <div class="small">File upload size Max 50 MB </div>
                                                            <br/>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating small">Password open file</label><br>
                                                                        <!--<span type="text" ><?php /*echo $vewc */?></span>-->
                                                                        <input type="hidden" name="password_php" value="<?php echo $vewc ?>"  class="form-control" >
                                                                        <input type="text" name="text_password_php"  class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-success" type="submit" name="submit">Upload</button>
                                                            <div class="clearfix"></div>
                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-4"></div>
                                </div>
