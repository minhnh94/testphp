<!DOCTYPE html>
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
        
        <?php
            include_once('header.php');
	?>
        
        <?php
            include_once('database.php');
            include_once('thembaithuoc.php');
            $bt = new baithuoc();
            $data = $bt->get_all('caythuoc');
        ?>
        <?php
            if(isset($_POST['submit'])){
		$a = $_POST['box1'];
		$b = array();
		
                $b = $_POST['box2'];
                $sql = "insert into baithuoc (tenBaiThuoc,moTaTacDung,maBenh,cachDung,trangThai,anhBaiThuoc) values ('bai thuoc 1','baithuoc 1','1','cachdung','1','http://')";
                $bt->query($sql);
			
           	$sql2 = 'select maBaiThuoc from baithuoc order by maBaiThuoc desc limit 0,1';
		$bt->query($sql2);
		$row = $bt->fetch();
                foreach ($row as $id1)
                    $id = $id1;
                foreach ($b as $id2){
                    $sql3 = "insert into baithuoccaythuoc (maBaiThuoc,maCayThuoc) values ('$id','$id2')";
                    $bt->query($sql3);
                }
            }
        ?>

  
<form method="post">
  <div class="main">
    	<div class="box">
        	<select name="box1" multiple="multiple">
            <option selected="selected">--chọn bài thuốc --</option>
            <option>chua dau đâu</option>
            <option>chua dau bung</option>
            <option>chua beo phi</option>
            </select>
        </div>
    <div class="box">
        	<select name="box2[]" multiple="multiple">
            <option selected="selected">--chon cây thuốc--</option>
            <?php
            	foreach($data as $row){
			?>
            <option value="<?php echo $row['maCayThuoc']?>"><?php echo $row['tenCayThuoc'];?></option>
            
            <?php
				}
			?>
            </select>
        </div>
        <div class="submit">
       	  <input class="box" name="submit" type="submit" value="Submit">
        </div>
        <div class="box">
        	<textarea cols="20" rows="10" disabled="disabled"><?php
            		if(isset($a)){
						echo $a;
						foreach($b as $rows){
							echo $rows;
							}
						
						}
				
			?></textarea>
        </div>
    </div>
</form>
        
        <?php
            include_once('footer.php');
	?>
    </body>
</html>