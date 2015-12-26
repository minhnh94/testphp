<?php
    include_once ('__autoload.php');
    include_once ('database.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = new user();
    $sql = "SELECT * FROM nguoidung WHERE tenDangNhap LIKE '$username'";
    $user->query($sql);
    $row = $user->fetch();
    session_start();
    if(empty($row)){
        $_SESSION['message'] = "Lỗi đăng nhập: người dùng không tồn tại.";
        header('Location: login.php');
    } else {
        $mk = $row['matKhau'];
        echo $mk;
        if(md5($password) == $mk){
            $_SESSION['user_name'] = $username;
            $_SESSION['ma_quyen'] = $row['maQuyen'];
            $_SESSION['user_id'] = $row['maNguoiDung'];
            $_SESSION['message'] = "Chào bạn, " .$username. ".";
            header('Location: index.php');
        } else {
            $_SESSION['message'] = "Lỗi đăng nhập: sai mật khẩu.";
            header('Location: login.php');
        }
    }

