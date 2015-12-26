<?php

    session_start();
    $_SESSION['user_name'] = null;
    header('Location: index.php');

