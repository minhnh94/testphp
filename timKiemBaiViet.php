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
	if(isset($_POST['ok1'])) {
	$bt = $td = "";
	include_once 'bthuoc.php';
	include_once 'database.php';
    $bthuoc = new bthuoc();
	if($_POST['baiViet'] && $_POST['noiDung']) {	
	$bt = $_POST['baiViet'];
	$td = $_POST['noiDung'];
	$sql = "select * from baiViet where tenbaiViet like '%".$bt."%' && noiDung like '%".$td."%'";
	$bthuoc->query($sql);
	}
	else if($_POST['baiViet'] && $_POST['noiDung'] == null ) {	
	$bt = $_POST['baiViet'];
	$td = $_POST['noiDung'];
	$sql = "select * from baiViet where tenbaiViet like '%".$bt."%'";
	$bthuoc->query($sql);
	}
	else if($_POST['baiViet'] == null && $_POST['noiDung']) {	
	$bt = $_POST['baiViet'];
	$td = $_POST['noiDung'];
	$sql = "select * from baiViet where noiDung like '%".$td."%'";
	$bthuoc->query($sql);
	}
	if($_POST['baiViet'] == null && $_POST['noiDung'] == null) {	
	$bt = $_POST['baiViet'];
	$td = $_POST['noiDung'];
	$sql = "select * from baiViet";
	$bthuoc->query($sql);
	}
   
	}
	
?>
<table width="820" height="121" border="1" align="center">
  <tr>
    <td width="56">Mã bài viết</td>
    <td width="125">Tên bài viết</td>
    <td width="110">Nội dung</td>
  </tr>
 
  <?php
	$data = array();
    while($row = $bthuoc->fetch()){
		$data[] = $row;
	}
	foreach($data as $rows){
  ?>
  <tr>
    <td><?php echo $rows['maBaiViet'];?></td>
    <td><?php echo $rows['tenBaiViet'];?></td>
    <td><?php echo $rows['noiDung'];?></td>
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