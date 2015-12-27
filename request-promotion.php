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
        
        <div class="center-white"><form action="promotion-process.php" method="post" role="form">
            <?php
                if(empty($row['trangThai'])||$row['trangThai'] == 0){
            ?>
            Trở thành người quản lý sẽ cho bạn quyền lợi và trách nhiệm được đóng góp và chỉnh sửa nội dung hệ thống, tuy nhiên cũng sẽ phải tuân theo các ràng buộc riêng. Bạn chắc chắn muôn trở thành người quản lý chứ?<br>
            
            <center><input type="submit" value="Tôi đồng ý" class="button" style="width: 100%"/></center>
            <?php
                }
                if($row['trangThai'] > 0){
            ?>
            Đơn yêu cầu trước đó của bạn đã được gửi. Xin vui lòng chờ phản hồi từ ban quản trị hệ thống.
            <?php
                }
                if($row['trangThai'] < 0){
            ?>
            Chúng tôi rất tiếc nhưng hiện tại các vị trí quản lý đã đầy. Xin hãy chờ email của ban quản trị sau nhé. Xin cảm ơn bạn.
            <?php
                }
            ?>
            </form></div>
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>


