<?php

    include_once 'database.php';
    session_start();
    include_once 'doituong.php';
    $doituong = new doituong();
    
    $maBaiThuoc = $_POST['maBaiThuoc'];
    $noidung = $_POST['noiDung'];
    $user_id = $_SESSION['user_id'];
    $b = "INSERT INTO binhluanbaithuoc (maBaiThuoc,maNguoiDung,noiDung,ngayBinhLuan) values ($maBaiThuoc,$user_id,'$noidung',NOW())";
    $doituong->query($b);		
    
    header('Location: binhluanbaithuoc.php?maBaiThuoc=' .$maBaiThuoc. '#commentarea');

