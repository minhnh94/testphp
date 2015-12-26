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
            session_start();
            include_once 'doituong.php';
            include_once 'database.php';
            $bthuoc = new doituong();
            $sql = "select * from baithuoc";
            $bthuoc->query($sql);

        ?>
    </head>
    <body>
        <?php
            include_once('header.php');
	?>
        <div class="white-trans-container">
            <h2>Danh sách bài thuốc trong hệ thống</h2>
            <center>(click vào tên bài thuốc để đi tới chi tiết)</center>
            <table width="820" height="121" border="1" align="center">
                <?php
                    $data = array();
                    while($row = $bthuoc->fetch()){
                        $data[] = $row;
                    }
                    foreach($data as $rows){
                ?>
                <tr>
                    <td rowspan="2" class="table-STT"><?php echo $rows['maBaiThuoc'];?></td>
                    <?php echo "<td colspan='2' class='table-title'><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td>"; ?>
                </tr>
                <tr>
                    <td class="table-detail"><?php echo $rows['moTaTacDung'];?></td>
                    <td class="table-detail"><?php echo $rows['cachDung'];?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>