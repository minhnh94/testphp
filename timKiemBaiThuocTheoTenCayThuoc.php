<html>
    <head>
        <meta charset="UTF-8">
        <title>Đông Y Online | Hệ thống thông tin bài thuốc Đông Y</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./lib/bootstrap.min.css">
        <script src="./lib/jquery.min.js"></script>
        <script src="./lib/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
    <body>
        <div class="white-trans-container">
<?php
session_start();
include_once('header.php');
	if(isset($_POST['ok4'])) {
	$bt = $td = "";
	include_once 'bthuoc.php';
	include_once 'database.php';
    $bthuoc = new bthuoc();
	if($_POST['tenThuoc'] == null) {	
	$sql = "select * from baithuoc";
	$bthuoc->query($sql);
	}
	else if($_POST['tenThuoc']) {	
	$bt = $_POST['tenThuoc'];
	$sql = "SELECT * FROM (baithuoc JOIN baithuoccaythuoc on baithuoc.maBaiThuoc = baithuoccaythuoc.maBaiThuoc)
	JOIN caythuoc on caythuoc.maCayThuoc = baithuoccaythuoc.maCayThuoc where tenCayThuoc like '%".$bt."%'";
	$bthuoc->query($sql);
	}
	}
	
?>
<table width="820" height="121" border="1" align="center">
  <tr>
    <td width="56">Mã Bài Thuốc</td>
    <td width="125">Tên Bài Thuốc</td>
    <td width="68">Mô Tả Tác Dụng</td>
    <td width="110">Mã Bệnh</td>
    <td width="63">Cách Dùng</td>
    <td width="48">Trạng Thái</td>
  </tr>
 
  <?php
	$data = array();
    while($row = $bthuoc->fetch()){
		$data[] = $row;
	}
	foreach($data as $rows){
  ?>
  <tr>
    <td><?php echo $rows['maBaiThuoc'];?></td>
    <td><?php echo $rows['tenBaiThuoc'];?></td>
     <td><?php echo $rows['moTaTacDung'];?></td>
      <td><?php echo $rows['maBenh'];?></td>
       <td><?php echo $rows['cachDung'];?></td>
         <td><?php echo $rows['trangThai'];?></td>
  </tr>
  <?php
    }
  ?>
</table>
<?php
            include_once('footer.php');
	?>
        </div>
    </body>
</html>