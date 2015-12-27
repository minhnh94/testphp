<?php

include_once('database.php');

class benhMD extends database {

    public $tenBenh = NULL;
    public $tenBaiThuoc = NULL;
    public $cachDung = NULL;
    public $tenCayThuoc  = NULL;
    public $khoiLuong = NULL;


    public function __construct() {
        $this->connect();
    }
}
?>