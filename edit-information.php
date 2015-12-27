<?php
    session_start();
    include_once 'database.php';
    include_once 'user.php';
    $userid = intVal($_SESSION['user_id']);
    include_once('user.php');
    $user1 = new user();
    $sql = "SELECT * FROM nguoidung WHERE maNguoiDung = $userid";
    $user1->query($sql);
    
    $row = $user1->fetch();
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
        <link rel="stylesheet" type="text/css" href="./css/user-page.css">
    </head>
    <body class="center-body">
        
        <?php
            include_once('header.php');
	?>
        
        <div class="center-white"><form action="information-process.php" method="post" role="form">
            <table>
                <tr>
                    <td class="left-td">Họ và tên:</td>
                    <td><input type="text" name="fullname" value='<?php echo $row['hoTen'];?>'/></td>
                </tr>
                <tr>
                    <td class="left-td">Email:</td>
                    <td><input type="text" name="email" required value='<?php echo $row['email'];?>'/></td>
                </tr>
                <tr>
                    <td colspan="2" class="table-STT"><center><input type="submit" value="Lưu" class="button" style="width: 100%"/></center></td>
                </tr>
            </table></form>
        </div>
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>


