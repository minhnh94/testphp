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
    </head>
    <body class="center-body">
        
        <?php
            include_once('header.php');
	?>
        
        <div class="center-white">
            Vui lòng đăng nhập để sử dụng các chức năng nâng cao của hệ thống.<br>
            <br>Xin cảm ơn.
        </div>
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>


