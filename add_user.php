<?php
    include_once('user.php');
    if (isset($_POST['submit_name'])) {
            if ($_POST['user_name'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $tenDangNhap = $_POST['user_name'];
            }
            if ($_POST['user_pass'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $matKhau = $_POST['user_pass'];
            }
            if ($_POST['email'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $email = $_POST['email'];
            }
			if ($_POST['name'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $hoTen = $_POST['name'];
            }
			if ($_POST['maquyen'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $maQuyen = $_POST['maquyen'];
            }
			if ($_POST['ngaydangky'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $ngayDangKy = $_POST['ngaydangky'];
            }
			if ($_POST['trangthai'] == '') {
                $error = 'khong duoc de trong';
            } else {
                $trangThai = $_POST['trangthai'];
            }
           if($tenDangNhap && $matKhau && $email && $hoTen && $maQuyen && $ngayDangKy && $trangThai){
               $user1 = new user();
               $user1->set_tk($tenDangNhap);
			   $user1->set_mk($matKhau);
			   $user1->setName($hoTen);
			   $user1->setEmail($email);
			   $user1->set_qtc($maQuyen);
			   $user1->setNgaydangky($ngayDangKy);
			   $user1->setTrangthai($trangThai);
			  
               if($user1->add_user() == "user exist"){
                  $error =  'tai khoan da ton tai';
                   
               }else{
				header('location:admin-board.php');
               }
               
           }
    }
?>
<form method="post">
<span style="color:red; text-align:center;"><h3><?php if(isset($error)){echo $error;}?></h3></span>
<table align="center" width="400" border="1">
  <tr>
    <td colspan="2">Khoi tao thong tin tai khoan cho thanh vien</td>
    
  </tr>
  <tr>
    <td width="240">Ten Nguoi Dung</td>
    <td width="144"><input type="text" name="user_name"></td>
  </tr>
  <tr>
    <td>Mat khau</td>
    <td><input type="password" name="user_pass"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email"></td>
  </tr>
  <tr>
    <td>Ho ten</td>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
    <td>Ma Quyen</td>
    <td><input type="text" name="maquyen"></td>
  </tr>
  <tr>
    <td>Ngay Dang Ky</td>
    <td><input type="text" name="ngaydangky"></td>
  </tr>
  <tr>
    <td>Trang Thai</td>
    <td><input type="text" name="trangthai"></td>
  </tr>
  <tr>
    <td colspan="6"><input type="submit" name="submit_name" value="Them"></td>
  </tr>
</table></form>
