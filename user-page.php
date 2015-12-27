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
            include_once('message.php');
            if(empty($_SESSION['user_name'])){
                header('Location: login-require.php');
            }
            include_once('doituong.php');
            $userid = $_SESSION['user_id'];
            $user1 = new doituong();
            $sql = "SELECT * FROM nguoidung WHERE maNguoiDung = $userid";
            $user1->query($sql);
    
            $row = $user1->fetch();
            $nguoidung = $row['tenDangNhap'];
            $av = (intVal($row['maNguoiDung'])%10);
            $maquyen = $row['maQuyen'];
	?>
        
        <div class="main-panel">
            <div class="left-panel">
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
                <h4>Lịch sử tra cứu:</h4>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Ngày tra cứu</th>
                        <th>Từ khóa tra cứu</th>
                        <th>Kiểu tra cứu</th>
                    </tr>
                <?php
                    $log = new doituong();
                    $sql2 = "SELECT * FROM log WHERE maNguoiDung = $userid";
                    $log->query($sql2);
                    $data = array();
                    while($row2 = $log->fetch()){
                        $data[] = $row2;
                    }
                    $i = 0;
                    foreach($data as $row2){
                        $i++;
                ?>
                    <tr>
                        <td class="table-STT"><?php echo $i;?></th>
                        <td class="table-STT"><?php echo $row2['ngayTraCuu'];?></td>
                        <td><?php echo $row2['tuKhoa'];?></td>
                        <td><?php 
                            $kieu = $row2['ghiChu'];
                            $kieu1 = intval($kieu[0]);
                            $kieu2 = intval($kieu[1]);
                            switch ($kieu1){
                                case 1:
                                    echo "Bài thuốc";
                                    break;
                                case 2:
                                    echo "Cây thuốc";
                                    break;
                                case 3:
                                    echo "Vị thuốc";
                                    break;
                                case 4:
                                    echo "Bệnh";
                                    break;
                                case 5:
                                    echo "Tác dụng";
                                    break;
                                case 6:
                                    echo "Bài viết";
                                    break;
                                default:
                                    break;
                            }
                            switch ($kieu2){
                                case 1:
                                    echo " kết hợp với bài thuốc";
                                    break;
                                case 2:
                                    echo " kết hợp với cây thuốc";
                                    break;
                                case 3:
                                    echo " kết hợp với vị thuốc";
                                    break;
                                case 4:
                                    echo " kết hợp với bệnh";
                                    break;
                                case 5:
                                    echo " kết hợp với tác dụng";
                                    break;
                                case 6:
                                    echo " kết hợp với bài viết";
                                    break;
                                default:
                                    break;
                            }
                        ?></td>
                    </tr>
               
                <?php
                    }        
                ?>
                 </table>
            </div>
            <div class="right-panel">
                <a href="change-password.php"><button class="user-button">Thay đổi mật khẩu</button></a>
                <a href="edit-information.php"><button class="user-button">Sửa thông tin cá nhân</button></a>          
                <a href="advance-search.php"><button class="user-button">Tìm kiếm nâng cao</button></a>
                    <?php
                    if($maquyen == 3||$maquyen == 4){
                        echo "<a href='manager.php'><button class='user-button'>Chức năng quản lý</button></a>";
                    } else {
                        echo "<a href='request-promotion.php'><button class='user-button'>Đăng ký làm người quản lý</button></a>";
                    }
                    if($maquyen == 4){
                        echo "<a href='admin-board.php'><button class='user-button'>Bảng quản trị</button></a>";
                    }
                ?>
            </div>
            
            <div class="content-clear"><br>.</div>
        </div>
    </body>
</html>

