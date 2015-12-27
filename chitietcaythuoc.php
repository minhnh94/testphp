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
            
            $maCayThuoc = $_GET['maCayThuoc'];
            
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
                    <img src="./img/caythuoc.png"> <?php echo $cayThuoc['tenCayThuoc'];?>
                </div>
                <table class="search-table" style="width: 95%;">
                    <tr>
                        <td>
                            <h4>Tên gọi khác</h4><?php echo $cayThuoc['tenKhac']; ?>
                        </td>
                        <td class="right-td" rowspan="8">
                            <center><?php
                                $anh = $cayThuoc['anh'];
                                if(empty($anh)||$anh == ""){
                                    echo "<b>(Chưa có hình ảnh)</b>";
                                } else {
                                    echo "<img src='" .$anh. "' alt='Vui lòng kết nối Internet để xem ảnh'>";
                                }
                                ?></center>
                            <h4>Các vị thuốc lấy từ cây thuốc này</h4>
                            <table>
                                <?php
                                    $sql = "SELECT * from vithuoc where maThamChieu = '".$maCayThuoc."'";
                                    $doituong->query($sql);
                                    $data = array();
                                    while($row = $doituong->fetch()){
                                        $data[] = $row;
                                    }
                                    $stt = 0;
                                    foreach($data as $rows){
                                        $stt++;
                                ?>
                                <tr>
                                    <td class="table-STT"><?php echo $stt;?></td>
                                    <td><?php 
                                            $maViThuoc = intval($rows['maViThuoc']);
                                            echo "<a href='chitietvithuoc.php?maViThuoc=" .$maViThuoc. "'>" .$rows['tenViThuoc']. "</a>";
                                        ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                            <h4>Các tác dụng của cây thuốc này</h4>
                            <table>
                                <?php
                                    $sql3 = "SELECT * from caythuoctacdung where maCayThuoc = '".$maCayThuoc."'";
                                    $doituong->query($sql3);
                                    $data = array();
                                    while($row = $doituong->fetch()){
                                        $data[] = $row;
                                    }
                                    $stt = 0;
                                    foreach($data as $rows){
                                        $stt++;
                                        $sql4 = "SELECT * from tacdung where maTacDung = '".$rows['maTacDung']."'";
                                        $doituong2->query($sql4);
                                        $rows2 = $doituong2->fetch();
                                ?>
                                <tr>
                                    <td class="table-STT"><?php echo $stt;?></td>
                                    <td><?php echo $rows2['tenTacDung'];?> </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                            <h4>Các bệnh được chữa bởi cây thuốc này</h4>
                            <table>
                                <?php
                                    $sql3 = "SELECT * from caythuocbenh where maCaythuoc = '".$maCayThuoc."'";
                                    $doituong->query($sql3);
                                    $data = array();
                                    while($row3 = $doituong->fetch()){
                                        $data[] = $row3;
                                    }
                                    $stt = 0;
                                    foreach($data as $rows3){
                                        $stt++;
                                        $sql4 = "SELECT * from benh where maBenh = '".$rows3['maBenh']."'";
                                        $doituong2->query($sql4);
                                        $rows4 = $doituong2->fetch();
                                ?>
                                <tr>
                                    <td class="table-STT"><?php echo $stt;?></td>
                                    <td><?php echo $rows4['tenBenh'];?> </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Tên khoa học</h4><?php echo $cayThuoc['tenKhoaHoc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Thuộc họ</h4><?php echo $cayThuoc['ho']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Mô tả</h4><?php echo $cayThuoc['moTa']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Thu hái</h4><?php echo $cayThuoc['thuHai']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Chủ trị</h4><?php echo $cayThuoc['chuTri']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Kiêng kỵ</h4><?php echo $cayThuoc['kiengKy']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Tính chất</h4><?php echo $cayThuoc['tinhChat']; ?>
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