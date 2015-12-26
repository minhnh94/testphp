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
	if(isset($_POST['ok3'])) {
	$bt = $td = "";
	include_once 'bthuoc.php';
	include_once 'database.php';
    $bthuoc = new bthuoc();
	if($_POST['tenCayThuoc'] && $_POST['chuTri']) {	
	$bt = $_POST['tenCayThuoc'];
	$td = $_POST['chuTri'];
	$sql = "select * from caythuoc where tenCayThuoc like '%".$bt."%' && chuTri like '%".$td."%' ";
	$bthuoc->query($sql);
	}
	else if($_POST['tenCayThuoc'] && $_POST['chuTri'] == null ) {	
	$bt = $_POST['tenCayThuoc'];
	$td = $_POST['chuTri'];
	$sql = "select * from caythuoc where tenCayThuoc like '%".$bt."%'";
	$bthuoc->query($sql);
	}
	else if($_POST['tenCayThuoc'] == null && $_POST['chuTri']) {	
	$bt = $_POST['tenCayThuoc'];
	$td = $_POST['chuTri'];
	$sql = "select * from caythuoc where chuTri like '%".$td."%'";
	$bthuoc->query($sql);
	}
	if($_POST['tenCayThuoc'] == null && $_POST['chuTri'] == null) {	
	$bt = $_POST['tenCayThuoc'];
	$td = $_POST['chuTri'];
	$sql = "select * from caythuoc";
	$bthuoc->query($sql);
	}
   
	}
	
?>
<table width="820" height="121" border="1" align="center">
  <tr>
    <td width="56">Mã Cây Thuốc</td>
    <td width="125">Tên Cây Thuốc</td>
    <td width="68">Tên Khác</td>
    <td width="110">Tên khoa học</td>
    <td width="63">Chủ trị</td>
    <td width="48">Kiêng kỵ</td>
  </tr>
 
  <?php
	$data = array();
    while($row = $bthuoc->fetch()){
		$data[] = $row;
	}
	foreach($data as $rows){
  ?>
  <tr>
    <td><?php echo $rows['maCayThuoc'];?></td>
    <td><?php echo $rows['tenCayThuoc'];?></td>
    <td><?php echo $rows['tenKhac'];?></td>
	<td><?php echo $rows['tenKhoaHoc'];?></td>
	<td><?php echo $rows['chuTri'];?></td>
	<td><?php echo $rows['kiengKy'];?></td>
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