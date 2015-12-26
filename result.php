<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đông Y Online | Hệ thống thông tin bài thuốc Đông Y</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./lib/bootstrap.min.css">
        <script src="./lib/jquery.min.js"></script>
        <script src="./lib/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/home.css">
        
        <?php
//            require './SQLConnection.php';
            include_once 'doituong.php';
            include_once 'database.php';
            session_start();
            $keyword = $_POST['keyword'];
            
        ?>
        <style>
            .floating-right {
                width: 30%;
                float: right;
            }
            br {
                clear: both;
            }
        </style>
    </head>
    <body>
        <?php
            include_once('header.php');
	?>
        <div class="white-trans-container">
            <div class="search-result-panel">
                <div class="floating-right"><a href="advance-search.php"><button>TÌM KIẾM NÂNG CAO</button></a></div>
                <h3>KẾT QUẢ TÌM KIẾM</h3><br>
            <?php
                $log = new doituong();
                $userid = $_SESSION['user_id'];
                $ip = $_SERVER['REMOTE_ADDR'];
                $sql2 = "INSERT INTO log (ngayTraCuu, maNguoiDung, ip, tuKhoa, ghiChu) VALUES (NOW(), '$userid', '$ip', '$keyword', '10')";
                $log->query($sql2);
            
                $doituong = new doituong();
                $sql = "SELECT * FROM baithuoc WHERE tenBaiThuoc LIKE '%" .$keyword. "%'";
                $doituong->query($sql);
                $data = array();
                echo"<table border='1'>";
                while($row = $doituong->fetch()){
                    $data[] = $row;
                }
                foreach($data as $rows){
                    echo "<tr><td rowspan='2' class='table-STT'>" .$rows['maBaiThuoc']. "</td>";
                    echo "<td colspan='2' class='table-title'><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td>";
                    echo "</tr><tr><td class='table-detail'>" .$rows['moTaTacDung']. "</td>";
                    echo "<td class='table-detail'>" .$rows['cachDung']. "</td></tr>";
                }
                echo "</table>";
            ?>
            </div>
        </div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>


