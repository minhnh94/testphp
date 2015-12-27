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
            
            $maBenh = $_GET['maBenh'];
            
            $benh_req = mysql_query("SELECT * FROM benh WHERE maBenh = '$maBenh'");
            $benh = mysql_fetch_array($benh_req);
        ?>
    </head>
    <body id="myPage" >
        <?php
            include_once('header.php');
	?>
        <div class="white-trans-container">
            <div class="search-panel">
                <div class="left-header-panel">
                    <img src="./img/benh.png"> <?php echo $benh['tenBenh'];?>
                </div>
                <table class="search-table" style="width: 95%;">
                    <tr>
                        <td>
                            <h4>Các bài thuốc chữa bệnh thuộc nhóm này</h4>
                            <table>
                                <?php
                                    $sql = "SELECT * from baithuoc where maBenh = '".$maBenh."'";
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
                                    <td><?php echo "<a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a>";?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                            
                        </td>
                        <td>
                            <h4>Các cây thuốc chữa bệnh thuộc nhóm này</h4>
                            <table>
                                <?php
                                    $sql = "SELECT * from caythuocbenh where maBenh = '".$maBenh."'";
                                    $doituong->query($sql);
                                    $data = array();
                                    while($row = $doituong->fetch()){
                                        $data[] = $row;
                                    }
                                    $stt = 0;
                                    foreach($data as $rows){
                                        $stt++;
                                        $sql2 = "SELECT * from caythuoc where maCayThuoc = '".$rows['maCaythuoc']."'";
                                        $doituong2->query($sql2);
                                        $rows2 = $doituong2->fetch();
                                ?>
                                <tr>
                                    <td class="table-STT"><?php echo $stt;?></td>
                                    <td><?php echo "<a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCaythuoc']. "'>" .$rows2['tenCayThuoc']. "</a>";?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
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