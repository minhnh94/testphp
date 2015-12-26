<?php

include_once('database.php');

class cThuoc extends database {

    public function __construct() {
        $this->connect();
    }
}
?>