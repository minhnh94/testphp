<?php
    session_start();
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
﻿<?php
        include_once 'doituong.php';
	include_once 'database.php';
        $cThuoc = new doituong();
	$sql = "select * from caythuoc";
	$cThuoc->query($sql);
	
	
?>
        
    </head>
    <body>
        
        <?php
            include_once('header.php');
	?>
        
        <div class="white-trans-container">
            <div class="search-result-panel">
                <h3>DANH SÁCH CÂY THUỐC TRONG HỆ THỐNG</h3>
                <center>(click vào tên cây thuốc để xem chi tiết - Ctrl+F để tìm nhanh bằng trình duyệt)</center>
                <table border="1" align="center">
                    <tr>
                        <th width="50">Mã Cây Thuốc</th>
                        <th width="50">Tên Cây Thuốc</th>
                        <th width="68">Tên Khác</th>
                        <th width="50">Tên Khoa Học</th>
                        <th width="63">Ảnh</th>
                        <th width="48">Họ</th>
                        <th width="48">Mô Tả</th>
                        <th width="48">Thu Hái</th>
                        <th width="48">Chủ Trị</th>
                        <th width="48">Kiêng Kỵ</th>
                        <th width="48">Tính Chất</th>
                    </tr>

                    <?php
                        $data = array();
                        while($row = $cThuoc->fetch()){
                            $data[] = $row;
                        }
                        foreach($data as $rows){
                            $stt = strval(intVal($rows['maCayThuoc']));
                    ?>
                    <tr>
                        <td class="table-STT"><?php echo $stt;?></td>
                        <td><?php echo "<a href='chitietcaythuoc.php?maCayThuoc=" .$stt. "'>" .$rows['tenCayThuoc']. "</a>";?></td>
                        <td><?php echo $rows['tenKhac'];?></td>
                        <td><?php echo $rows['tenKhoaHoc'];?></td>
                        <td><?php 
                            if(empty($rows['anh'])||$rows['anh'] == ""){
                                echo "Chưa có hình ảnh";
                            } else {
                                echo "<img src='" .$rows['anh']. "' alt='Vui lòng kết nối Internet để xem ảnh' width='100'>";
                            }
                        ?></td>
                        <td><?php echo $rows['ho'];?></td>
                        <td><?php echo $rows['moTa'];?></td>
                        <td><?php echo $rows['thuHai'];?></td>
                        <td><?php echo $rows['chuTri'];?></td>
                        <td><?php echo $rows['kiengKy'];?></td>
                        <td><?php echo $rows['tinhChat'];?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
        <?php
            include_once('footer.php');
	?>
        
    </body>
</html>