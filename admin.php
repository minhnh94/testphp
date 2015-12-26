<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <p align="center">Xin chao <span style="color:red;"><?php echo $_SESSION['user_name'];?></span> đã đăng nhập hệ thống! 
   
    <?php
        if(!empty($_GET['page'])){
            switch ($_GET['page']){
                case 'add_user':include_once 'add_user.php';
                    break;
                case 'edit_user':include_once 'edit_user.php'; 
                    break;
                default: include_once 'list.php';
            }
        
        } else {
            include_once 'list.php';
        }
    ?>

</body>
</html>