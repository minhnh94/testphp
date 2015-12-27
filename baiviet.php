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
            $baiviet = new doituong();
            $sql = "select * from baiviet ORDER BY ngayViet DESC";
            $baiviet->query($sql); 
        ?> 
    </head>
    <body>
        
        <?php
            include_once('header.php');
	?>
        
        <div class="white-trans-container">
            <div class="flow-container">
                <h3>DANH MỤC BÀI VIẾT TRONG HỆ THỐNG</h3>
                (từ mới nhất đến cũ nhất - lia chuột để xem tóm tắt - nhấn vào từng bái viết để xem chi tiết)
                <div class="clear-all">.</div>
                <?php
                    $data1 = array();
                    while($row1 = $baiviet->fetch()){
                        $data1[] = $row1;
                    }
                    foreach($data1 as $rows1){
                ?>
                <div class="article-container" style="background-image: url('<?php echo $rows1['anhMinhHoa']?>')">
                    <?php echo "<a href='chitietbaiviet.php?maBaiViet=" .$rows1['maBaiViet']. "'>";?><div class="article-content">    
                        <div class="article-space">.</div>
                        <div class="article-title"><?php echo $rows1['tenBaiViet']?></div>
                        <div class="article-summary"><?php echo $rows1['tomTat']?></div>
                    </div><?php "</a>";?>
                </div>
                            
                        <?php
                            }
                        ?>
                <div class="clear-all">.</div>
                
            </div>
        </div>
        
        <?php
            include_once('footer.php');
	?>
        
    </body>
</html>