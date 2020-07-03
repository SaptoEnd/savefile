
<?
session_start();
require_once 'config/koneksi.php';
require_once  'config/ConfigFile.php';
require_once  'config/Login.php';


//header
include "pages/partrial/header.php";
if (isset($_GET['act'])){
    $act = $_GET['act'];
}else{
    $act = "";
}

/*session level*/
if (isset($_SESSION['level'])){
    if ($_SESSION['level']=='admin'){

    }elseif ($_SESSION['level']=='user'){

        if ($act == "tambahFile"){
            include "pages/login/tambahFile.php";

        }elseif ($act=="myFile"){
            include "pages/login/userDashboard.php";

        }elseif ($act=="logout"){
            include "pages/logout.php";
        }
    }
}elseif ($act=="sementara"){
    include "pages/sementara.php";

}elseif ($act=="permanen"){
    include "pages/permanen.php";

}elseif ($act=="loginDirect"){
    //include "pages/login.php";
    include "pages/loginDirect.php";
}elseif ($act=="login"){
    //include "pages/login.php";
    include "pages/login.php";
}
else{
    //include "error.html";
    include "home.php";
    //include "pages/userDashboard.php";

}


include "pages/partrial/footer.php";
?>
