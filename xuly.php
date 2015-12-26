<?php
	include_once('database.php');
	$tenbaithuoc=$_POST['baithuoc'];
	$dulieu=$_POST['themBT'];
	$mb=explode('.',$tenbaithuoc);
	$dl=explode('#',$dulieu);
	if(isset($_POST['them'])){
		$sql="DELETE FROM `baithuoccaythuoc` WHERE maBaiThuoc='$mb[0]'";
		mysql_query($sql);
		foreach ($dl as $value) {
			if($value!=''){
				$v=explode(':',$value);
				$m=explode('.',$v[0]);
				$sql1="INSERT INTO `baithuoccaythuoc`(`maBaiThuoc`, `maCayThuoc`, `khoiLuong`) VALUES ('$mb[0]','$m[0]','$v[1]')";
				mysql_query($sql1);
			}
		}
		 
	}
?>