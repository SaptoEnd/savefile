<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/2/20
 * Time: 2:58 AM
 */

class Login
{
    var $con;

    function __construct($kon)
    {
        $this->con = $kon;
    }

    /*login*/
    function loginDirect($pas){
        $hasil=1;
        $sql="SELECT * FROM `akun` WHERE `password`='$pas'";
        $query=mysqli_query($this->con,$sql);

        $n=mysqli_num_rows($query);
        $data=mysqli_fetch_array($query);
        if ($n>0){

            /* header('location:index.php');*/
            if ($data['level'] == 'admin') {

                $_SESSION['password'] = $data['password'];
                // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
                $_SESSION['level'] 	  = $data['level'];
                /*echo '<script>alert("selamat datang , admin"); window.location="index.php?&id='.$data['id_user'].'"</script>';*/
                echo '<script>window.location="index.php?aksi=admin&id=?"</script>';

            }elseif($data['level'] == 'user'){
                $_SESSION['password'] = $data['password'];
                // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
                $_SESSION['level'] 	  = $data['level'];
                $_SESSION['id_user'] 	  = $data['id_user'];
                echo '<script>window.location="index.php?act=myFile&&id='.$data['id_user'].'"</script>';
            }

        }else{
            echo '<script>
                            alert(" Gagal Masuk, mungkin katasandi atau username salah");
                  </script>';
        }
    }

}