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
        <link rel="stylesheet" type="text/css" href="./css/benh.css">
        <link rel="stylesheet" type="text/css" href="./css/custom-avarta.css">
        ﻿<?php
            include_once 'database.php';

            include_once 'doituong.php';
            $doituong = new doituong();
            $doituong2 = new doituong();
            
            $maBaiViet = $_GET['maBaiViet'];
            
            $baiviet_req = mysql_query("SELECT * FROM baiviet WHERE maBaiViet = '$maBaiViet'");
            $baiviet = mysql_fetch_array($baiviet_req);
            
            $tacgia_req = mysql_query("SELECT * from nguoidung where maNguoiDung = '".$baiviet['maNguoiDung']."'");
            $tacgia = mysql_fetch_array($tacgia_req);
        ?>
    </head>
    <body id="myPage" >
        <?php
            include_once('header.php');
	?>
        <div class="white-container">
            <div class="article-detail">
                <h3><b><?php echo $baiviet['tenBaiViet'];?></b></h3>
                <div class="article-line">.</div>
                <b><i>Viết bởi <?php echo "<a href='chitietnguoidung.php?maNguoiDung=" .$tacgia['maNguoiDung']. "'>" .$tacgia['tenDangNhap']. "</a>"; ?> vào <?php echo $baiviet['ngayViet']; ?></i></b>
                <div class="article-detail-image"><br>
                    <?php
                        $anh = $baiviet['anhMinhHoa'];
                            if(empty($anh)||$anh == ""){
                                echo "<b>(Chưa có hình ảnh)</b>";
                            } else {
                                echo "<img src='" .$anh. "' alt='Vui lòng kết nối Internet để xem ảnh' width ='400'>";
                            }
                    ?>
                </div>
                <br><?php echo $baiviet['tomTat'];?><br>
                <br>
                <?php echo $baiviet['noiDung'];?>
                <div class="article-line">.</div><br>
            </div>
    </div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>