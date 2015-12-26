<html>
    <head>
        <meta charset="UTF-8">
        <title>Đông Y Online | Đăng nhập</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./lib/bootstrap.min.css">
        <script src="./lib/jquery.min.js"></script>
        <script src="./lib/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./css/home.css">
        <link rel="stylesheet" type="text/css" href="./css/login.css">
        <script>
            
        </script>
    </head>
    <body class="login-body" data-spy="scroll" data-target=".navbar" data-offset="60">
        <?php
            include_once('header.php');
            session_start();
            if(empty($_SESSION['user_name'])){
                header('Location: index.php');
            }
	?>
        
        
        
        <?php
            include_once('footer.php');
	?>
    </body>
</html>

