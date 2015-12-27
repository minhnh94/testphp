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
        <link rel="stylesheet" type="text/css" href="./css/search.css">
        <link rel="stylesheet" type="text/css" href="./css/user-page.css">
    </head>
    <body class="center-body">
        
        <?php
            include_once('header.php');
	?>
        
        <div class="center-white"><form action="password-process.php" method="post" role="form">
            <table>
                <tr>
                    <td class="left-td">Mật khẩu cũ:</td>
                    <td><input type="password" name="oldpass" required/></td>
                </tr>
                <tr>
                    <td class="left-td">Mật khẩu mới:</td>
                    <td><input type="password" name="newpass" required/></td>
                </tr>
                <tr>
                    <td class="left-td">Gõ lại mật khẩu mới:</td>
                    <td><input type="password" name="repass" required/></td>
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


