<?php
    include_once("../model/M_PhongBan.php");
    include_once("./C_Admin.php");
    class C_PhongBan{
        public function __construct(){}
        public function getAllPhongBan(){
            $m_phongban = new M_phongban();
            $phongbans = $m_phongban->getAllPhongBans();
            if($phongbans!==null){
                include_once("../views/PhongBanList.html");
            }
            else{

            }
        }
        public function getPhongBan(){
            $m_phongban = new M_phongban();
            $phongban = $m_phongban->getPhongBanbyId($_GET['idpb']);
            if($phongban!==null){

            }
            else{

            }
        }
        public function findPhongBan(){
            if(isset($_POST['typefind'])){
                $m_phongban = new M_phongban();
                $phongbans = $m_phongban->findPhongBan($_POST['typefind'],$_POST['datafind']);
                include_once("../views/PhongBanList.html");
            }else{
                include_once("../views/FormFindPhongBan.html");
            }
        }
        public function addPhongBan(){
            if(isset($_POST['idpb'])){
                $m_phongban = new M_phongban();
                $phongban = new PhongBan($_POST['idpb'],$_POST['tenpb'],$_POST['mota']);
                if($phongban->idpb!=null && $phongban->tenpb!=null && $phongban->mota!=null){
                    $m_phongban->addPhongBan($phongban);
                    $phongbans = $m_phongban->getAllPhongBans();
                    include_once("../views/PhongBanList.html");
                }
                else{
                include_once("../views/FormAddPhongBan.html");
                }
            }
            else{
                include_once("../views/FormAddPhongBan.html");
            }
        }
        public function updatePhongBan(){
            if(isset($_POST['idpb'])){
                $m_phongban = new M_phongban();
                $phongban = new PhongBan($_POST['idpb'],$_POST['tenpb'],$_POST['mota']);
                if($phongban->idpb!=null && $phongban->tenpb!=null && $phongban->mota!=null){
                    $m_phongban->updatePhongBan($phongban);
                }
                $phongbans = $m_phongban->getAllPhongBans();
                include_once("../views/PhongBanListUpdate.html");
            }
            if(isset($_GET['idpb'])){
                $m_phongban = new M_phongban();
                $phongban = $m_phongban->getPhongBanbyId($_GET['idpb']);
                if($phongban!=null   )
                    include_once("../views/FormUpdatePhongBan.html");
                else{
                    $phongbans = $m_phongban->getAllPhongBans();
                    include_once("../views/PhongBanListUpdate.html");
                }
            }
            else{
                $m_phongban = new M_phongban();
                $phongbans = $m_phongban->getAllPhongBans();
                include_once("../views/PhongBanListUpdate.html");
            }
        }
        public function deletePhongBan(){
            $m_phongban = new M_phongban();
            if(isset($_GET['idpb'])){
                $m_phongban->deletePhongBan($_GET['idpb']);
            }
            $phongbans = $m_phongban->getAllPhongBans();
            include_once("../views/PhongBanListDelete.html");
        }
    }
    $c_phongban = new C_PhongBan();
    $login = new C_Admin();
    // if(isset($_GET['idpb'])){
        // $c_phongban->getPhongBan();
    // }
    // else 
    if(isset($_GET['find'])){
        $c_phongban->findPhongBan();
    }
    else if(isset($_GET['add'])){
        $login->login();
        $c_phongban->addPhongBan();
    }
    else if(isset($_GET['update'])){
        $login->login();
        $c_phongban->updatePhongBan();
    }
    else if(isset($_GET['delete'])){
        $login->login();
        $c_phongban->deletePhongBan();
    }
    else{
        $c_phongban->getAllPhongBan();

    }

?>