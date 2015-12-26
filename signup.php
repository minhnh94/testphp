<?php

    include_once('user.php');
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $email = $_POST['email'];
    
    if (strlen($password)<8){
        $_SESSION['message'] = "Lỗi đăng ký: mật khẩu quá ngắn! Hãy nhập mật khẩu có ít nhât 8 kí tự.";
        header('Location: login.php');
    }
    if (!($password == $confirmPassword)){
        $_SESSION['message'] = "Lỗi đăng ký: mật khẩu không khớp.";
        header('Location: login.php');
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Lỗi đăng ký: email đã nhập không hợp lệ.";
        header('Location: login.php');
    }
    for($i=0;$i<strlen($username);$i++){
        if($username[i] == " "){
            $_SESSION['message'] = "Lỗi đăng ký: tên đăng nhập không được chứa dấu cách.";
            header('Location: login.php');
        }
    }
    $user1 = new user();
    $user1->set_tk($username);
    $user1->set_mk(md5($password));
    $user1->setName($hoTen);
    $user1->setEmail($email);
    $user1->set_qtc(2);
    $user1->setNgaydangky(date('Y-m-d'));
    $user1->setTrangthai(0);
    if($user1->add_user() == "user exist"){
        $_SESSION['message'] = "Lỗi đăng ký: tên đăng nhập đã tồn tại.";
        header('Location: login.php');  
    }else{
	$_SESSION['message'] = "Đăng ký thành công: " .$username. ".";
        header('Location: login.php');
    }
    