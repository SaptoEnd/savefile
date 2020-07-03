<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/4/20
 * Time: 12:51 AM
 */

$files = new ConfigFile($con);

$idUser = $_SESSION['id_user'];

if ($_POST){
    /*variabel input*/
    $filePhp = "";
    $jenis = $_POST['jenis'];

    $target_dir = "file/";
    /*meminta hak akses open file*/
    if (!file_exists($target_dir)){
        mkdir($target_dir, 0777,true);
    }

    /*penamaan file*/
    $target_file = $target_dir.$_FILES['file']['name'];
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
                $files->uploadFile($idUser,$namaFile,$jenis);
                //$files->uploadFile($fileName,$tgl);
                echo '<script type="text/javascript"> window.location="index.php?act=myFile&&id='.$idUser.'"</script>';
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

<!--form popUo-->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah file</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h6>Tambah file</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="small" name="file"  required>
                    <br/>
                    <div class="small">File upload size Max 50 MB </div>
                    <br>
                    <table border="0">
                        <tr>
                            <td>Silahkan pilih jenis penyimpanan</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="jenis" value="1" checked />Permanen</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="jenis" value="0"/>Sementara</td>
                        </tr>
                    </table>
                    <br>
                    <div class="footer">
                        <button type="submit" class="btn btn-success" >Tambah</button>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!--selesai-->
