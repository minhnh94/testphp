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
        <link rel="stylesheet" type="text/css" href="./css/search.css">
        <link rel="stylesheet" type="text/css" href="./css/custom-avarta.css">
        ﻿<?php
            include_once 'database.php';

            include_once 'doituong.php';
            $doituong = new doituong();
            $doituong2 = new doituong();
            
            $maViThuoc = $_GET['maViThuoc'];
            
            $viThuoc_req = mysql_query("SELECT * FROM vithuoc WHERE maViThuoc = '$maViThuoc'");
            $viThuoc = mysql_fetch_array($viThuoc_req);
            
            $maCayThuoc = $viThuoc['maThamChieu'];
            
            $cayThuoc_req = mysql_query("SELECT * FROM caythuoc WHERE maCayThuoc = '$maCayThuoc'");
            $cayThuoc = mysql_fetch_array($cayThuoc_req);
        ?>
    </head>
    <body id="myPage" >
        <?php
            include_once('header.php');
	?>
        <div class="white-trans-container">
            <div class="search-panel">
                <div class="left-header-panel">
                    <img src="./img/vithuoc.png"> <?php echo $viThuoc['tenViThuoc'];?>
                </div>
                <table class="search-table" style="width: 95%;">
                    <tr>
                        <td>
                            <h4>Thuộc cây thuốc</h4><?php echo "<a href='chitietcaythuoc.php?maCayThuoc=" .$maCayThuoc. "'>" .$cayThuoc['tenCayThuoc']. "</a>"; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Chủ trị</h4><?php echo $viThuoc['chuTri']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Kiêng kỵ</h4><?php echo $viThuoc['kiengKy']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Tính chất</h4><?php echo $viThuoc['tinhChat']; ?>
                        </td>
                    </tr>
                </table>
            </div>
    </div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>