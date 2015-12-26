<?php
	include_once('user.php');
    $userid = $_GET['user_id'];
    $user1 = new user();
    $sql = "SELECT * FROM nguoidung WHERE maNguoiDung = $userid";
    $user1->query($sql);
    
    $row = $user1->fetch();
    
    if (isset($_POST['submit_name'])) {
            if ($_POST['user_name'] == '') {
                $error = 'khong duoc de trong1';
            } else {
                $tenDangNhap = $_POST['user_name'];
            }
            if ($_POST['user_pass'] == '') {
                $error = 'khong duoc de trong2';
            } else {
                $pass = $_POST['user_pass'];
            }
            if ($_POST['hoten'] == '') {
                $error = 'khong duoc de trong3';
            } else {
                $hoTen = $_POST['hoten'];
            }
			if ($_POST['email'] == '') {
                $error = 'khong duoc de trong4';
            } else {
                $email = $_POST['email'];
            }
			if ($_POST['maquyen'] == '') {
                $error = 'khong duoc de trong5';
            } else {
                $maQuyen = $_POST['maquyen'];
            }
			if ($_POST['ngaydangky'] == '') {
                $error = 'khong duoc de trong6';
            } else {
                $ngayDangKy = $_POST['ngaydangky'];
            }
			if ($_POST['trangthai'] == '') {
                $error = 'khong duoc de trong7';
            } else {
                $trangThai = $_POST['trangthai'];
            }
      if($tenDangNhap && $pass && $hoTen && $email && $maQuyen && $ngayDangKy && $trangThai){
          $user2 = new user();
		  $user2->setId($userid);
          $user2->set_tk($tenDangNhap);
		  $user2->set_mk($pass);
		  $user2->setName($hoTen);
		  $user2->setEmail($email);
		  $user2->set_qtc($maQuyen);
		  $user2->setNgaydangky($ngayDangKy);
		  $user2->setTrangthai($trangThai);
		  
          if($user2->edit_user() == 'user exist'){
              $error = 'tai khoan da ton tai';
          }else{
              header('location:admin-board.php');
          }
      }
    }
?>
<form method="post"><table align="center" width="400" border="1">
  <tr>
    <td colspan="2"><?php if(isset($error)){echo $error;}else{echo 'Sua thong tin thanh vien';}?></td>
    
  </tr>
  <tr>
    <td width="240">Tai khoan</td>
    <td width="144"><form method="post"><input type="text" name="user_name" value="<?php if(isset($_POST['user_name'])){echo $_POST['user_name'];}else{echo $row['tenDangNhap'];}?>"></td>
  </tr>
  <tr>
    <td>Mat khau</td>
    <td><input type="password" name="user_pass" value="<?php if(isset($_POST['user_pass'])){echo $_POST['user_pass'];}else{echo $row['matKhau'];}?>"></td>
  </tr>
  <tr>
    <td>ho ten</td>
    <td><input type="text" name="hoten" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}else{echo $row['hoTen'];}?>"></td>
  </tr>
  <tr>
    <td>email</td>
    <td><input type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else{echo $row['email'];}?>"></td>
  </tr>
  <tr>
    <td>ma quyen</td>
    <td><input type="text" name="maquyen" value="<?php if(isset($_POST['maquyen'])){echo $_POST['maquyen'];}else{echo $row['maQuyen'];}?>"></td>
  </tr>
  <tr>
    <td>ngay dang ky</td>
    <td><input type="text" name="ngaydangky" value="<?php if(isset($_POST['ngaydangky'])){echo $_POST['ngaydangky'];}else{echo $row['ngayDangKy'];}?>"></td>
  </tr>
  <tr>
    <td>trang thai</td>
    <td><input type="text" name="trangthai" value="<?php if(isset($_POST['trangthai'])){echo $_POST['trangthai'];}else{echo $row['trangThai'];}?>"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit_name" value="Update"></td>
  </tr>
</table></form>
