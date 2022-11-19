<?php
    include_once("../model/E_Admin.php");
    class M_admin{
        function __construct(){}
        
        public function getAdmin($username){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="SELECT * FROM `admin` where username='$username'";
            $result = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($result);
            if(isset($row['id']))
                return new Admin($row['id'],$row['username'],$row['password']);
            
            throw new Exception("Can't find your account");
        }
        public function addAdmin($admin){
            $link = mysqli_connect("localhost","root","") or die("Can't connect to Database");
            mysqli_select_db($link,"DULIEU");
            $sql="insert into admin (id,username,password) values ('$admin->id','$admin->username','$admin->password')";
            try {
                $result = mysqli_query($link,$sql);
            } catch (\Throwable $th) {
                echo $th;
                throw $th;
            }
        }
    }
?>