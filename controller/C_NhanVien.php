<?php
    include_once("../model/M_NhanVien.php");
    include_once("./C_Admin.php");
    class C_NhanVien{
        public function __construct(){}
        public function getAllNhanViens(){
            $m_nhanvien = new M_nhanvien();
            $nhanviens = $m_nhanvien->getAllNhanViens();
            if($nhanviens!==null){
                include_once("../views/NhanVienList.html");
            }
            else{
                
            }
        }
        public function getNhanVien(){
            $m_nhanvien = new M_nhanvien();
            $nhanvien = $m_nhanvien->getNhanVienbyId($_GET['id']);
            if($nhanvien!==null){
                ///////////
            }
            else{
                ///////////
            }
        }
        public function getNhanViensbyPhongBan(){
            $m_nhanvien = new M_nhanvien();
            $nhanviens = $m_nhanvien->findNhanVien("idphongban",$_GET['idphongban']);
            if($nhanviens!==null){
                include_once("../views/NhanVienList.html");
            }
            else{
                ///////////
            }
        }
        public function findNhanVien(){
            if(isset($_POST['typefind'])){
                $m_nhanvien = new M_nhanvien();
                $nhanviens = $m_nhanvien->findNhanVien($_POST['typefind'],$_POST['datafind']);
                if($nhanviens!==null){
                    include_once("../views/NhanVienList.html");
                }
                else{
                    include_once("../views/FormFindNhanVien.html");
                }
            }
            else{
                    include_once("../views/FormFindNhanVien.html");
            }
        }
        public function addNhanvien(){
            include_once("../model/M_PhongBan.php");
            $m_phongban = new M_phongban();
            $phongbans = $m_phongban->getAllPhongBans();
            if(isset($_POST['id'])){
                $m_nhanvien = new M_nhanvien();
                $nhanvien = new NhanVien($_POST['id'],$_POST['hoten'],$_POST['idphongban'],"",$_POST['diachi']);
                if($nhanvien->id!=null && $nhanvien->hoten!=null && $nhanvien->idphongban!=null && $nhanvien->diachi!=null){
                    $m_nhanvien->addNhanVien($nhanvien);
                    $this->getAllNhanViens();
                }else{
                include_once("../views/FormAddNhanVien.html");
                }
            }else{
                include_once("../views/FormAddNhanVien.html");               
            }
        }
        public function updateNhanVien(){
            if(isset($_POST['id'])){
                $m_nhanvien = new M_nhanvien();
                $nhanvien = new NhanVien($_POST['id'],$_POST['hoten'],$_POST['idphongban'],"",$_POST['diachi']);
                if($nhanvien->id!=null && $nhanvien->hoten!=null && $nhanvien->idphongban!=null && $nhanvien->diachi!=null){
                    $m_nhanvien->updateNhanVien($nhanvien);
                    $nhanviens = $m_nhanvien->getAllNhanViens();
                    include_once("../views/NhanVienListUpdate.html");
                }else{
                    $m_nhanvien = new M_nhanvien();
                    $nhanviens = $m_nhanvien->getAllNhanViens();
                    include_once("../views/NhanVienListUpdate.html");
                }
            }else if(isset($_GET['id'])){
                include_once("../model/M_PhongBan.php");
                $m_phongban = new M_phongban();
                $phongbans = $m_phongban->getAllPhongBans();
                $m_nhanvien = new M_nhanvien();
                $nhanvien = $m_nhanvien->getNhanVienbyId($_GET['id']);
                include_once("../views/FormUpdateNhanVien.html");
            }else{
                $m_nhanvien = new M_nhanvien();
                $nhanviens = $m_nhanvien->getAllNhanViens();
                include_once("../views/NhanVienListUpdate.html");
            }
        }
        public function deleteNhanVien(){
            if(isset($_GET['id'])){
                $m_nhanvien = new M_nhanvien();
                $m_nhanvien->deleteNhanVien($_GET['id']);
                $nhanviens = $m_nhanvien->getAllNhanViens();
                include_once("../views/NhanVienListDelete.html");
            }else{
                $m_nhanvien = new M_nhanvien();
                $nhanviens = $m_nhanvien->getAllNhanViens();
                include_once("../views/NhanVienListDelete.html");
            }
        }
        public function deletesNhanVien(){
            if(isset($_POST['select'])){
                $selected = $_POST['select'];
                $m_nhanvien = new M_nhanvien();
                foreach($selected as $i){
                    $m_nhanvien->deleteNhanVien($i);
                }
                $nhanviens = $m_nhanvien->getAllNhanViens();
                include_once("../views/NhanVienListDeletes.html");
            }else{
                $m_nhanvien = new M_nhanvien();
                $nhanviens = $m_nhanvien->getAllNhanViens();
                include_once("../views/NhanVienListDeletes.html");
            }
        }
    }
    $c_nhanvien = new C_NhanVien();
    $login = new C_Admin();
    if(isset($_GET['idphongban'])){
        $c_nhanvien->getNhanViensbyPhongBan();
    }
    else if(isset($_GET['find'])){
        $c_nhanvien->findNhanVien();
    }
    else if(isset($_GET['add'])){
        $login->login();
        $c_nhanvien->addNhanvien();
    }
    else if(isset($_GET['update'])){
        $login->login();
        $c_nhanvien->updateNhanVien();
    }
    else if(isset($_GET['delete'])){
        $login->login();
        $c_nhanvien->deleteNhanVien();
    }
    else if(isset($_GET['deletes'])){
        $login->login();
        $c_nhanvien->deletesNhanVien();
    }
    else{
        $c_nhanvien->getAllNhanViens();
    }
?>