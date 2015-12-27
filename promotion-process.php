<?php
    session_start();
    include_once 'database.php';
    include_once 'user.php';
    $doituong = new user();
    
    $user_id = intVal($_SESSION['user_id']);
    
    $user_req = mysql_query("SELECT * FROM nguoidung WHERE maNguoiDung = " .$user_id. "");
    $user = mysql_fetch_array($user_req);
    $b = "UPDATE nguoidung SET trangThai = '1' WHERE nguoidung.maNguoiDung = " .$user_id. "";
    $doituong->query($b);
    $_SESSION['message'] = "Đăng ký trở thành người quản lý thành công!";
    
    
    header('Location: user-page.php');

