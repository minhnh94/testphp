<?php
    session_start();
    include_once 'database.php';
    include_once 'user.php';
    $doituong = new user();
    
    $user_id = intVal($_SESSION['user_id']);
    $oldpass= $_POST['oldpass'];
    $newpass= $_POST['newpass'];
    $repass= $_POST['repass'];
    
    $user_req = mysql_query("SELECT * FROM nguoidung WHERE maNguoiDung = " .$user_id. "");
    $user = mysql_fetch_array($user_req);
    
    if(md5($oldpass) != $user['matKhau']){
        $_SESSION['message'] = "Sai mật khẩu hiện tại. Xin hãy thử lại.";
    } else {
        if(strlen($newpass) < 8){
            $_SESSION['message'] = "Mật khẩu mới phải có ít nhất 8 kí tự.";
        } else {
            if($newpass != $repass){
                $_SESSION['message'] = "Mật khẩu gõ lại không khớp. Xin hãy thử lại.";
            } else {
                $mk = md5($newpass);
                $b = "UPDATE nguoidung SET matKhau = '" .$mk. "' WHERE nguoidung.maNguoiDung = " .$user_id. "";
                $doituong->query($b);
                $_SESSION['message'] = "Thay đổi mật khẩu thành công!";
            }
        }
    }
    
    
    header('Location: user-page.php');

