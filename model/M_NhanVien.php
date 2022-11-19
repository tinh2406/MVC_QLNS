<?php
    include_once('../model/E_NhanVien.php');
    class M_nhanvien{
        public function __construct(){}
        public function getAllNhanViens(){
            $nhanviens = [];
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="SELECT * FROM `nhanvien` INNER JOIN phongban ON nhanvien.idphongban = phongban.idpb";
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
                $nhanviens[$row['id']] = new NhanVien($row['id'],$row['hoten'],$row['idphongban'],$row['tenpb'],$row['diachi']);
            }
            mysqli_free_result($result);
            mysqli_close($link);
            return $nhanviens;
        }
        public function getNhanVienbyId($id){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="SELECT * FROM `nhanvien` INNER JOIN phongban ON nhanvien.idphongban = phongban.idpb where id=$id";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result);
            $nhanvien = new NhanVien($row['id'],$row['hoten'],$row['idphongban'],$row['tenpb'],$row['diachi']);
            mysqli_free_result($result);
            mysqli_close($link);
            return $nhanvien;
        }
        public function findNhanVien($typefind,$datafind){
            $nhanviens = [];
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            if($typefind==='id' || $typefind==='idpb')
                $sql="SELECT * FROM `nhanvien` INNER JOIN phongban ON nhanvien.idphongban = phongban.idpb where $typefind=$datafind";
            else
                $sql="SELECT * FROM `nhanvien` INNER JOIN phongban ON nhanvien.idphongban = phongban.idpb where $typefind='$datafind'";
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
                $nhanviens[$row['id']] = new NhanVien($row['id'],$row['hoten'],$row['idphongban'],$row['tenpb'],$row['diachi']);
            }
            mysqli_free_result($result);
            mysqli_close($link);
            return $nhanviens;
        }
        public function addNhanVien($nhanvien){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="insert into nhanvien (id,hoten,diachi,idphongban) values ($nhanvien->id,'$nhanvien->hoten','$nhanvien->diachi',$nhanvien->idphongban)";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
        }
        public function updateNhanVien($nhanvien){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="update nhanvien set hoten='$nhanvien->hoten',diachi='$nhanvien->diachi',idphongban=$nhanvien->idphongban where id=$nhanvien->id";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
        }
        public function deleteNhanVien($id){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="delete from nhanvien where id=$id";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
        }
    }


?>