<?php
    session_start();
    include_once 'doituong.php';
    include_once 'database.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đông Y Online | Hệ thống thông tin bài thuốc Đông Y</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./lib/bootstrap.min.css">
        <script src="./lib/jquery.min.js"></script>
        <script src="./lib/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/home.css">
        <link rel="stylesheet" type="text/css" href="./css/benh.css">
﻿        <?php
            $benh = new doituong();
            $sql = "select * from benh";
            $benh->query($sql); 
            
            $tacdung = new doituong();
            $sql = "select * from tacdung";
            $tacdung->query($sql); 
        ?> 
    </head>
    <body>
        
        <?php
            include_once('header.php');
	?>
        
        <div class="white-trans-container">
            <div class="main-container">
                <div class="left-container">
                    <h3>DANH SÁCH CÁC BỆNH TRONG HỆ THỐNG</h3>
                    <center>(click vào tên bệnh để xem chi tiết - Ctrl+F để tìm nhanh bằng trình duyệt)</center>
                    <table border="1" align="center">
                        <tr>
                            <th width="50">Mã Bệnh</th>
                            <th width="50">Tên Bệnh</th>
                            
                        <?php
                            $data1 = array();
                            while($row1 = $benh->fetch()){
                                $data1[] = $row1;
                            }
                            foreach($data1 as $rows1){
                        ?>
                        <tr>
                            <td class="table-STT"><?php echo $rows1['maBenh'];?></td>
                            <td><?php echo "<a href='chitietbenh.php?maBenh=" .$rows1['maBenh']. "'>" .$rows1['tenBenh']. "</a>";?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                
                <div class="right-container">
                    <h3>DANH SÁCH CÁC TÁC DỤNG CHỮA TRỊ TRONG HỆ THỐNG</h3>
                    <center>(click vào tên tác dụng để xem chi tiết - Ctrl+F để tìm nhanh bằng trình duyệt)</center>
                    <table border="1" align="center">
                        <tr>
                            <th width="50">Mã Tác dụng</th>
                            <th width="50">Tên Tác dụng</th>
                            
                        <?php
                            $data2 = array();
                            while($row2 = $tacdung->fetch()){
                                $data2[] = $row2;
                            }
                            foreach($data2 as $rows2){
                        ?>
                        <tr>
                            <td class="table-STT"><?php echo $rows2['maTacDung'];?></td>
                            <td><?php echo "<a href='chitiettacdung.php?maTacDung=" .$rows2['maTacDung']. "'>" .$rows2['tenTacDung']. "</a>";?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                
                <div class="clear-all">.</div>
            </div>
        </div>
        
        <?php
            include_once('footer.php');
	?>
        
    </body>
</html>