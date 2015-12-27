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
            session_start();

            include_once 'doituong.php';
            $doituong = new doituong();
            $doituong2 = new doituong();

            $maBaiThuoc = $_GET['maBaiThuoc'];
            
            $baiThuoc_req = mysql_query("SELECT * FROM baithuoc WHERE maBaiThuoc = '$maBaiThuoc'");
            $baiThuoc = mysql_fetch_array($baiThuoc_req);
            
            $nhomBenh_req = mysql_query("SELECT * FROM benh WHERE maBenh = '" .intVal($baiThuoc['maBenh']). "'");
            $nhomBenh = mysql_fetch_array($nhomBenh_req);
        ?>
    </head>
    <body id="myPage" >
        <?php
            include_once('header.php');
	?>
        <div class="white-trans-container">
            <div class="search-panel">
                <div class="left-header-panel">
                    <img src="./img/baithuoc.png"> <?php echo $baiThuoc['tenBaiThuoc'];?>
                </div>
                <table class="search-table" style="width: 95%;">
                    <tr>
                        <td>
                            <h4>Mô tả</h4><?php echo $baiThuoc['moTaTacDung'] ?>
                        </td>
                        <td class="right-td" rowspan="3">
                            <h4>Các cây thuốc có trong bài</h4>
                            <table>
                                <?php
                                    $sql = "SELECT * from baithuoccaythuoc where maBaithuoc = '".$maBaiThuoc."'";
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
                                    <td><?php echo $rows['khoiLuong'];?> g</td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Cách dùng</h4><?php echo $baiThuoc['cachDung'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Chữa bệnh thuộc nhóm</h4><?php echo $nhomBenh['tenBenh'] ?>
                        </td>
                    </tr>
                </table><br>
            </div><br>
            <?php
                $binhluanbaithuoc_req = mysql_query("SELECT * FROM binhluanbaithuoc WHERE maBaiThuoc='$maBaiThuoc'");
                $nbre_binhluanbaithuoc = mysql_num_rows($binhluanbaithuoc_req);
                $a = array();
                while($row = mysql_fetch_array($binhluanbaithuoc_req)){
                    $a[] = $row;
                }		
            ?>
            <div class="search-panel" id="commentarea">
                <h4><?php echo $nbre_binhluanbaithuoc ?> bình luận về bài thuốc này:</h4><br/>
                <?php foreach ($a as $binhluanbaithuoc) { 
                    $sql2 = "SELECT * from nguoidung where maNguoiDung = '".$binhluanbaithuoc['maNguoiDung']."'";
                    $doituong2->query($sql2);
                    $rows2 = $doituong2->fetch();
                    $nguoidung = $rows2['tenDangNhap'];
                    $maquyen = intVal($rows2['maQuyen']);
                    $av = (intVal($rows2['maNguoiDung'])%10);
                ?>
                <div class="comment-panel">
                    <?php echo "<div class='av" .$av. "'>" .$nguoidung[0]. "</div>";?><div class="comment-space">.</div>
                    <div class="comment-panel-name"><?php echo "<a href='chitietnguoidung.php?maNguoiDung=" .$rows2['maNguoiDung']. "'>" .$nguoidung. "</a>";?></div>
                    <div class="comment-panel-content"><?php 
                            switch ($maquyen){
                                case 4:
                                    echo "Quản trị viên";
                                    break;
                                case 3:
                                    echo "Quản lý";
                                    break;
                                case 2:
                                    echo "Thành viên";
                                    break;
                                case 1:
                                    echo "Khách vãng lai";
                                    break;
                                default:
                                    echo "Khách vãng lai";
                                    break;
                                    
                            }
                            echo "<br>";
                            echo "Ngày bình luận: " .$binhluanbaithuoc['ngayBinhLuan']. "";
                        ?>
                            
                    </div>
                    <div class="comment-clear">.</div>
                    <?php echo $binhluanbaithuoc['noiDung'];?>
                </div>
                <?php } ?>
                <h4>Để lại bình luận của bạn:</h4>
                <form method="POST" action="binhluan-process.php">
                    <input type="hidden" name="maBaiThuoc" value="<?php echo $maBaiThuoc ?>"/>
                    <textarea name="noiDung" style="width: 95%; height: 200px;" required></textarea>
                    <input type="submit" name="submit" value="Bình luận" class="button"/>
                </form><br>
            </div>
    </div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>