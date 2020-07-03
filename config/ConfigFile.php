<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/24/20
 * Time: 12:47 AM
 */

class ConfigFile
{
    var $con;

    function __construct($kon)
    {
        $this->con = $kon;
    }

    //insert file database
    function uploadFile($idUser,$namaFile,$jenis){
        $hasil = 1;
        $sql = "INSERT INTO file (`id_file`,`id_user`,`nama_file`,`jenis`,`tgl_file`) VALUES (NULL ,'$idUser','$namaFile','$jenis',NOW())";
        $query = mysqli_query($this->con,$sql);
        if (!$query){
            $hasil = 0;
        }
        return $hasil;
    }

    //menampilkan kode  otomatis sementara
    function v_cod(){
        $hasil=1;
        $sql ="SELECT max(id_user) as maxKode FROM scode ";
        $query= mysqli_query($this->con,$sql);
        if (!$query){
            $hasil=0;
        }
        $vCod=mysqli_fetch_array($query);
        $k_unik=$vCod['maxKode'];
        $no_kode = (int)substr($k_unik,3,3);
        $no_kode++;

        $char="usr";
        $vCod=$char.sprintf("%03s",$no_kode)."s";
        return $vCod;
    }

    //inputAkunPassword
    function inputScode($idUser){
        $hasil = 1;
        $sql = "INSERT INTO scode (`id_scode`, `id_user`,`tanggal`) VALUES (NULL ,'$idUser',NOW())";
        $query = mysqli_query($this->con,$sql);
        if (!$query){
            $hasil = 0;
        }
        return $hasil;
    }

    //inputAkunPassword
    function inputAkun($idUser,$password,$level){
        $hasil = 1;
        $sql = "INSERT INTO akun (`id_akun`, `id_user`,`password`,`level`) VALUES (NULL ,'$idUser','$password','$level')";
        $query = mysqli_query($this->con,$sql);
        if (!$query){
            $hasil = 0;
        }
        return $hasil;
    }

    //menampilkan kode  otomatis permanen
    function p_cod(){
        $hasil=1;
        $sql ="SELECT max(id_user) as maxKode FROM pcode ";
        $query= mysqli_query($this->con,$sql);
        if (!$query){
            $hasil=0;
        }
        $pCod=mysqli_fetch_array($query);
        $k_unik=$pCod['maxKode'];
        $no_kode = (int)substr($k_unik,3,3);
        $no_kode++;

        $char="usr";
        $pCod=$char.sprintf("%03s",$no_kode)."p";
        return $pCod;
    }

    //inputAkunPassword
    function inputPcode($idUser){
        $hasil = 1;
        $sql = "INSERT INTO pcode (`id_pcode`, `id_user`,`tanggal`) VALUES (NULL ,'$idUser',NOW())";
        $query = mysqli_query($this->con,$sql);
        if (!$query){
            $hasil = 0;
        }
        return $hasil;
    }

    /*view data file berdasarkan id*/
    function viewDataUserId($getIdUser){
        $hasil = 1;
        $sql = "SELECT * FROM file WHERE id_user IN ('$getIdUser')";
        //$sql = "SELECT * FROM file";
        $query = mysqli_query($this->con,$sql);
        if(!$query){
            $hasil = 0;
        }
        return $query;
    }



}
