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
    <body>
        <?php
            include_once('header.php');
            session_start();
	?>
        <div class="white-trans-container">

<?php
    ob_start();
    include '__autoload.php';
    include_once 'admin.php';
   ?>
</div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>