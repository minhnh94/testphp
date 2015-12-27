<?php
    session_start();
    include_once 'database.php';
    include_once 'user.php';
    $doituong = new user();
    
    $user_id = intVal($_SESSION['user_id']);
    $hoTen= $_POST['fullname'];
    $email= $_POST['email'];
    
    $user_req = mysql_query("SELECT * FROM nguoidung WHERE maNguoiDung = " .$user_id. "");
    $user = mysql_fetch_array($user_req);
    $b = "UPDATE nguoidung SET hoTen = '" .$hoTen. "', email = '" .$email. "' WHERE nguoidung.maNguoiDung = " .$user_id. "";
    $doituong->query($b);
    $_SESSION['message'] = "Thay đổi thông tin cá nhân thành công!";
    
    
    header('Location: user-page.php');

