<html>
    <head>
        <meta charset="UTF-8">
        <title>Đông Y Online | Trang cá nhân</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./lib/bootstrap.min.css">
        <script src="./lib/jquery.min.js"></script>
        <script src="./lib/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/home.css">
        <link rel="stylesheet" type="text/css" href="./css/search.css">
        <link rel="stylesheet" type="text/css" href="./css/user-page.css">
        <link rel="stylesheet" type="text/css" href="./css/custom-avarta.css">
        <script>
            
        </script>
    </head>
    <body class="login-body" data-spy="scroll" data-target=".navbar" data-offset="60">
        <?php
            session_start();
            include_once('header.php');
            include_once('footer.php');
            if(empty($_SESSION['user_name'])){
                header('Location: login-require.php');
            }
            include_once('doituong.php');
            $userid = $_GET['maNguoiDung'];
            $user1 = new doituong();
            $sql = "SELECT * FROM nguoidung WHERE maNguoiDung = $userid";
            $user1->query($sql);
    
            $row = $user1->fetch();
            $nguoidung = $row['tenDangNhap'];
            $av = (intVal($row['maNguoiDung'])%10);
            $maquyen = $row['maQuyen'];
	?>
        <div class="main-container">
            <div class="panel-eight">
                <?php echo "<div class='av" .$av. "'>" .$nguoidung[0]. "</div>";?><div class="comment-space">.</div>
                <div class="comment-panel-name"><?php echo $nguoidung;?></div>
                <div class="comment-panel-content">
                    <?php 
                        echo "<b>";
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
                        echo "</b><br>";
                        echo "Ngày tham gia: " .$row['ngayDangKy']. "";
                    ?>
                    <div class="comment-clear">.</div>
                    <br>
                </div><br>
                <table class="user-table">
                    <tr>
                        <td class="left-td">Họ và tên:</td>
                        <td class="value-td"><?php echo $row['hoTen'];?></td>
                    </tr>
                    <tr>
                        <td class="left-td">Email:</td>
                        <td class="value-td"><?php echo $row['email'];?></td>
                    </tr>
                </table>
                <h4>Các bài đã viết:</h4>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Tên bài viết</th>
                    </tr>
                <?php
                    $log = new doituong();
                    $sql2 = "SELECT * FROM baiviet WHERE maNguoiDung = $userid";
                    $log->query($sql2);
                    $data = array();
                    while($row2 = $log->fetch()){
                        $data[] = $row2;
                    }
                    $i = 0;
                    foreach($data as $rows2){
                        $i++;
                ?>
                    <tr>
                        <td class="table-STT"><?php echo $i;?></th>
                        <td><?php echo "<a href='chitietbaiviet.php?maBaiViet=" .$rows2['maBaiViet']. "'>" .$rows2['tenBaiViet']. "</a>";?></th>
                        </td>
                    </tr>
               
                <?php
                    }        
                ?>
                 </table>
            </div>
        </div>
    </body>
</html>

