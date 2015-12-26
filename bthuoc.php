<?php

include_once('database.php');

class bthuoc extends database {

    public $maBaiThuoc = NULL;
    public $tenBaiThuoc = NULL;
    public $tacDung = NULL;
    public $maBenh = NULL;
    public $cachDung = NULL;
    public $trangThai = NULL;


    public function __construct() {
        $this->connect();
    }
}
?>