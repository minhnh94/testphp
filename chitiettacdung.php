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
            
            $maTacDung = $_GET['maTacDung'];
            
            $tacdung_req = mysql_query("SELECT * FROM tacdung WHERE maTacDung = '$maTacDung'");
            $tacdung = mysql_fetch_array($tacdung_req);
        ?>
    </head>
    <body id="myPage" >
        <?php
            include_once('header.php');
	?>
        <div class="white-trans-container">
            <div class="search-panel">
                <div class="left-header-panel">
                    <img src="./img/tacdung.png"> <?php echo $tacdung['tenTacDung'];?>
                </div>
                <table class="search-table" style="width: 95%;">
                    <tr>
                        <td>
                            <h4>Các bài thuốc có tác dụng này</h4>
                            <table>
                                <?php
                                    $sql = "SELECT * from baithuoctacdung where maTacDung = '".$maTacDung."'";
                                    $doituong->query($sql);
                                    $data = array();
                                    while($row = $doituong->fetch()){
                                        $data[] = $row;
                                    }
                                    $stt = 0;
                                    foreach($data as $rows){
                                        $stt++;
                                        $sql2 = "SELECT * from baithuoc where maBaiThuoc = '".$rows['maBaiThuoc']."'";
                                        $doituong2->query($sql2);
                                        $rows2 = $doituong2->fetch();
                                ?>
                                <tr>
                                    <td class="table-STT"><?php echo $stt;?></td>
                                    <td><?php echo "<a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows2['tenBaiThuoc']. "</a>";?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </td>
                        <td>
                            <h4>Các cây thuốc có tác dụng này</h4>
                            <table>
                                <?php
                                    $sql = "SELECT * from caythuoctacdung where maTacDung = '".$maTacDung."'";
                                    $doituong->query($sql);
                                    $data = array();
                                    while($row = $doituong->fetch()){
                                        $data[] = $row;
                                    }
                                    $stt = 0;
                                    foreach($data as $rows){
                                        $stt++;
                                        $sql2 = "SELECT * from caythuoc where maCayThuoc = '".$rows['maCayThuoc']."'";
                                        $doituong2->query($sql2);
                                        $rows2 = $doituong2->fetch();
                                ?>
                                <tr>
                                    <td class="table-STT"><?php echo $stt;?></td>
                                    <td><?php echo "<a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows2['tenCayThuoc']. "</a>";?></td>
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