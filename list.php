<?php
    //include_once 'user.php';
    $user1 = new user();
    $sql = "SELECT * FROM nguoidung";
    $user1->query($sql);
?>
<table width="820" height="121" border="1" align="center">
  <tr>
  
    <td height="29" colspan="10">Danh sach thanh vien <a href="admin-board.php?page=add_user">Them moi thanh vien (+)</a></td>
    
  </tr>
  <tr>
    <td width="56">Mã Người Dùng</td>
    <td width="125">Tên Đăng Nhập</td>
    <td width="68">Mật khẩu</td>
    <td width="110">Email</td>
    <td width="63">Họ Tên</td>
    <td width="52">Mã Quyền</td>
    <td width="156">Ngày Đăng kí</td>
    <td width="48">Trạng Thái</td>
    <td colspan="8">Quản tri</td>
  </tr>
 
  <?php
    while($row = $user1->fetch()){
        
  ?>
  <tr>
    <td><?php echo $row['maNguoiDung'];?></td>
    <td><?php echo $row['tenDangNhap'];?></td>
     <td><?php echo $row['matKhau'];?></td>
      <td><?php echo $row['hoTen'];?></td>
       <td><?php echo $row['email'];?></td>
        <td><?php echo $row['maQuyen'];?></td>
         <td><?php echo $row['ngayDangKy'];?></td>
          <td><?php echo $row['trangThai'];?></td>
    <td width="42" align="center"><a href="admin-board.php?page=edit_user&user_id=<?php echo $row['maNguoiDung'];?>">Sua</a></td>
    <td width="36" align="center"><a href="del_user.php?user_id=<?php echo $row['maNguoiDung'];?>">Xoa</a></td>
  </tr>
  <?php
    }
  ?>
</table>