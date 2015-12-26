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
	if(isset($_POST['ok2'])) {
	$bt = $td = "";
	include_once 'bthuoc.php';
	include_once 'database.php';
    $bthuoc = new bthuoc();
	if($_POST['benh']) {	
	$bt = $_POST['benh'];
	$sql = "select * from benh where tenBenh like '%".$bt."%' ";
	$bthuoc->query($sql);
	}
	if($_POST['benh'] == null) {	
	$bt = $_POST['benh'];
	$sql = "select * from benh";
	$bthuoc->query($sql);
	}
	}
	
?>
<table width="820" height="121" border="1" align="center">
  <tr>
    <td width="56">Mã Bệnh</td>
    <td width="125">Tên Bệnh</td>
  </tr>
 
  <?php
	$data = array();
    while($row = $bthuoc->fetch()){
		$data[] = $row;
	}
	foreach($data as $rows){
  ?>
  <tr>
    <td><?php echo $rows['maBenh'];?></td>
    <td><?php echo $rows['tenBenh'];?></td>
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