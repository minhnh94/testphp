<?php

include_once('database.php');

class doituong extends database {

    public function __construct() {
        $this->connect();
    }
}
?>