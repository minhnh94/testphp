<!DOCTYPE html>
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
            session_start();
            include_once('header.php');
            if(empty($_SESSION['user_name'])){
                $_SESSION['message'] = "Đăng nhập để sử dụng hệ thống hoặc đăng ký tài khoản mới";
                $_SESSION['user_id'] = 0;
            }
	?>
        
        <div class="trans-container">
            <center>
            <h1>Đông Y Online</h1><br>
            <h3>Hệ thống tra cứu các bài thuốc Đông Y</h3><br>
            <hr>
            <div class="container section-container">
                <a href='baithuoc.php'><div class="round-section">
                    <img class="my-frame" src="img/frame.png"/>
                    <div class="section-bg"><img class="my-frame" src="img/section-1.jpg"/></div>
                    <div class="content-slide">
                        <div class="content-slide-inside">
                            <div class="content-slide-inside-top">Bài thuốc</div>
                        </div>
                    </div>
                </div></a>
                <a href='caythuoc.php'><div class="round-section">
                    <img class="my-frame" src="img/frame.png"/>
                    <div class="section-bg"><img class="my-frame" src="img/section-2.jpg"/></div>
                    <div class="content-slide">
                        <div class="content-slide-inside">
                            <div class="content-slide-inside-top">Cây thuốc</div>
                        </div>
                    </div>
                </div></a>
                <a href='benh.php'><div class="round-section">
                    <img class="my-frame" src="img/frame.png"/>
                    <div class="section-bg"><img class="my-frame" src="img/section-3.jpg"/></div>
                    <div class="content-slide">
                        <div class="content-slide-inside">
                            <div class="content-slide-inside-top">Bệnh</div>
                        </div>
                    </div>
                </div></a>
                <a href='baiviet.php'><div class="round-section">
                    <img class="my-frame" src="img/frame.png"/>
                    <div class="section-bg"><img class="my-frame" src="img/section-4.jpg"/></div>
                    <div class="content-slide">
                        <div class="content-slide-inside">
                            <div class="content-slide-inside-top">Bài viết khác</div>
                        </div>
                    </div>
                </div></a>
            </div>
            </center>
        </div>
        
        <?php
            include_once('footer.php');
	?>
    
    </body>
</html>

