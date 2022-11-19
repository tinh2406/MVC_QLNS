<?php
    class NhanVien{
        public $id;
        public $hoten;
        public $idphongban;
        public $tenpb;
        public $diachi;
        public function __construct($id,$hoten,$idphongban,$tenpb,$diachi){
            $this->id=$id;
            $this->hoten=$hoten;
            $this->idphongban=$idphongban;
            $this->tenpb=$tenpb;
            $this->diachi=$diachi;
        }
    }
?>