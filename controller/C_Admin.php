<?php
    if(session_status()===1)
        session_start();
    include_once("../model/M_Admin.php");
    class C_Admin{
        public function __construct(){}
        public function checkLogin(){
            if(isset($_SESSION['username'])){
                $m_admin = new M_admin();
                    $admin = $m_admin->getAdmin($_SESSION['username']);
                if($admin!=null){
                    return true;
                }
            }
                return false;
        }
        public function login(){
            if(!$this->checkLogin()){
                if(isset($_POST['username'])){
                    $m_admin = new M_admin();
                    $admin = $m_admin->getAdmin($_POST['username']);
                    if($admin!=null){
                        $_SESSION['username'] = $admin->username;
                        header("Location: ../views/welcome.html");
                    }else{
                        header("Location: ../views/welcome.html");
                    }
                }else{
                        header("Location: ../views/welcome.html");
                }
            }
            else{
            }
        }
        public function logout(){
            session_destroy();
            session_start();
            include_once("../views/welcome.html");
        }
    }
    $c_admin = new C_Admin();
    if(isset($_GET['logout'])){
        if($c_admin->checkLogin())
            $c_admin->logout();
        else{
            include_once("../views/welcome.html");
        }
    }else{
        $c_admin->login();
    }
?>