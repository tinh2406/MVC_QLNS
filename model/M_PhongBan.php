<?php
    include_once('../model/E_PhongBan.php');
    class M_phongban{
        public function __construct(){}
        public function getAllPhongBans(){
            $phongbans = [];
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="SELECT * from phongban";
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
                $phongbans[$row['idpb']]= new PhongBan($row['idpb'],$row['tenpb'],$row['mota']);
            }
            mysqli_free_result($result);
            mysqli_close($link);
            return $phongbans;
        }
        public function getPhongBanbyId($idpb){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="SELECT * from phongban where idpb=$idpb";
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
                $phongban= new PhongBan($row['idpb'],$row['tenpb'],$row['mota']);
            }
            mysqli_free_result($result);
            mysqli_close($link);
            return $phongban;
        }
        public function findPhongBan($typefind,$datafind){
            $phongbans = [];
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            if($typefind==='id')
                $sql="SELECT * from phongban where $typefind=$datafind";
            else
                $sql="SELECT * from phongban where $typefind='$datafind'";
            $result = mysqli_query($link,$sql);
            while($row = mysqli_fetch_array($result)){
                $phongbans[$row['idpb']]= new PhongBan($row['idpb'],$row['tenpb'],$row['mota']);
            }
            mysqli_free_result($result);
            mysqli_close($link);
            return $phongbans;
        }
        public function addPhongBan($phongban){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="insert into phongban (idpb,tenpb,mota) values ($phongban->idpb,'$phongban->tenpb','$phongban->mota')";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
            mysqli_close($link);    
        }
        public function updatePhongBan($phongban){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="update phongban set tenpb='$phongban->tenpb',mota='$phongban->mota' where idpb=$phongban->idpb";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
            mysqli_close($link);    
        }
        public function deletePhongBan($idpb){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="delete from phongban where idpb=$idpb";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
            mysqli_close($link);    
        }
    }
?>