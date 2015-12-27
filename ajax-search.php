<?php
    include_once 'database.php';
    include_once 'doituong.php';
    $doituong = new doituong();
    $doituong2 = new doituong();
    
    $cot1 = $_GET['theo1'];
    $cot2 = $_GET['theo2'];
    $bang1 = $_GET['bang1'];
    $bang2 = $_GET['bang2'];
    $tukhoa1 = $_GET['keyword1'];
    $tukhoa2 = $_GET['keyword2'];
    $loai1 = intval($_GET['table1']);
    $loai2 = intval($_GET['table2']);
    
    if($loai1 == 1&&$loai2 == 2){
        $sql = "SELECT * FROM baithuoc LEFT JOIN baithuoccaythuoc ON baithuoc.maBaiThuoc = baithuoccaythuoc.maBaiThuoc LEFT JOIN caythuoc ON baithuoccaythuoc.maCayThuoc=caythuoc.maCayThuoc WHERE baithuoc." .$cot1. " like '%" .$tukhoa1. "%' AND caythuoc." .$cot2. " like '%" .$tukhoa2. "%'";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã bài thuốc</th>";
        echo "<th>Tên bài thuốc</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maBaiThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maBaiThuoc']). "</td>";
                echo "<td><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 1&&$loai2 == 4){    
        $sql = "SELECT * FROM baithuoc LEFT JOIN benh ON baithuoc.maBenh = benh.maBenh WHERE baithuoc." .$cot1. " like '%" .$tukhoa1. "%' AND benh." .$cot2. " like '%" .$tukhoa2. "%'";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã bài thuốc</th>";
        echo "<th>Tên bài thuốc</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maBaiThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maBaiThuoc']). "</td>";
                echo "<td><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 1&&$loai2 == 5){
        $sql = "SELECT * FROM baithuoc LEFT JOIN baithuoctacdung ON baithuoc.maBaiThuoc = baithuoctacdung.maBaiThuoc LEFT JOIN tacdung ON baithuoctacdung.maTacDung=tacdung.maTacDung WHERE baithuoc." .$cot1. " like '%" .$tukhoa1. "%' AND tacdung." .$cot2. " like '%" .$tukhoa2. "%'";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã bài thuốc</th>";
        echo "<th>Tên bài thuốc</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maBaiThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maBaiThuoc']). "</td>";
                echo "<td><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 2&&$loai2 == 1){
        $sql = "SELECT * FROM caythuoc LEFT JOIN baithuoccaythuoc ON caythuoc.maCayThuoc = baithuoccaythuoc.maCayThuoc LEFT JOIN baithuoc ON baithuoccaythuoc.maBaiThuoc=baithuoc.maBaiThuoc WHERE baithuoc." .$cot2. " like '%" .$tukhoa2. "%' AND caythuoc." .$cot1. " like '%" .$tukhoa1. "%' ORDER BY caythuoc.maCayThuoc";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã cây thuốc</th>";
        echo "<th>Tên cây thuốc</th>";
        echo "<th>Mô tả</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maCayThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maCayThuoc']). "</td>";
                echo "<td><a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows['tenCayThuoc']. "</a></td>";
                echo "<td>" .$rows['moTa']. "</td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 2&&$loai2 == 3){
        $sql = "SELECT * FROM caythuoc LEFT JOIN vithuoc ON caythuoc.maCayThuoc = vithuoc.maThamChieu WHERE caythuoc." .$cot1. " like '%" .$tukhoa1. "%' AND vithuoc." .$cot2. " like '%" .$tukhoa2. "%'";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã cây thuốc</th>";
        echo "<th>Tên cây thuốc</th>";
        echo "<th>Mô tả</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maCayThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maCayThuoc']). "</td>";
                echo "<td><a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows['tenCayThuoc']. "</a></td>";
                echo "<td>" .$rows['moTa']. "</td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 2&&$loai2 == 4){
        $sql = "SELECT * FROM caythuoc LEFT JOIN caythuocbenh ON caythuoc.maCayThuoc = caythuocbenh.maCayThuoc LEFT JOIN benh ON caythuocbenh.maBenh=benh.maBenh WHERE caythuoc." .$cot1. " like '%" .$tukhoa1. "%' AND benh." .$cot2. " like '%" .$tukhoa2. "%' ORDER BY caythuoc.maCayThuoc";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã cây thuốc</th>";
        echo "<th>Tên cây thuốc</th>";
        echo "<th>Mô tả</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maCayThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maCayThuoc']). "</td>";
                echo "<td><a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows['tenCayThuoc']. "</a></td>";
                echo "<td>" .$rows['moTa']. "</td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 2&&$loai2 == 5){
        $sql = "SELECT * FROM caythuoc LEFT JOIN caythuoctacdung ON caythuoc.maCayThuoc = caythuoctacdung.maCayThuoc LEFT JOIN tacdung ON caythuoctacdung.maTacDung=tacdung.maTacDung WHERE caythuoc." .$cot1. " like '%" .$tukhoa1. "%' AND tacdung." .$cot2. " like '%" .$tukhoa2. "%' ORDER BY caythuoc.maCayThuoc";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã cây thuốc</th>";
        echo "<th>Tên cây thuốc</th>";
        echo "<th>Mô tả</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maCayThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maCayThuoc']). "</td>";
                echo "<td><a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows['tenCayThuoc']. "</a></td>";
                echo "<td>" .$rows['moTa']. "</td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 3&&$loai2 == 2){
        $sql = "SELECT * FROM vithuoc LEFT JOIN caythuoc ON caythuoc.maCayThuoc = vithuoc.maThamChieu WHERE caythuoc." .$cot2. " like '%" .$tukhoa2. "%' AND vithuoc." .$cot1. " like '%" .$tukhoa1. "%' ORDER BY vithuoc.maViThuoc";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã vị thuốc</th>";
        echo "<th>Tên vị thuốc</th>";
        echo "<th>Chủ trị</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maViThuoc']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maViThuoc']). "</td>";
                echo "<td><a href='chitietvithuoc.php?maViThuoc=" .$rows['maViThuoc']. "'>" .$rows['tenViThuoc']. "</a></td>";
                echo "<td>" .$rows['chuTri']. "</td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 4&&$loai2 == 1){    
        $sql = "SELECT * FROM benh LEFT JOIN baithuoc ON baithuoc.maBenh = benh.maBenh WHERE baithuoc." .$cot2. " like '%" .$tukhoa2. "%' AND benh." .$cot1. " like '%" .$tukhoa1. "%' ORDER BY benh.maBenh";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã Bệnh</th>";
        echo "<th>Tên bệnh</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maBenh']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maBenh']). "</td>";
                echo "<td><a href='chitietbenh.php?maBenh=" .$rows['maBenh']. "'>" .$rows['tenBenh']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 4&&$loai2 == 2){
        $sql = "SELECT * FROM benh LEFT JOIN caythuocbenh ON benh.maBenh = caythuocbenh.maBenh LEFT JOIN caythuoc ON caythuocbenh.maCayThuoc=caythuoc.maCayThuoc WHERE caythuoc." .$cot2. " like '%" .$tukhoa2. "%' AND benh." .$cot1. " like '%" .$tukhoa1. "%' ORDER BY benh.maBenh";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã Bệnh</th>";
        echo "<th>Tên bệnh</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maBenh']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maBenh']). "</td>";
                echo "<td><a href='chitietbenh.php?maBenh=" .$rows['maBenh']. "'>" .$rows['tenBenh']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 5&&$loai2 == 1){
        $sql = "SELECT * FROM tacdung LEFT JOIN baithuoctacdung ON tacdung.maTacDung = baithuoctacdung.maTacDung LEFT JOIN baithuoc ON baithuoctacdung.maBaiThuoc=baithuoc.maBaiThuoc WHERE baithuoc." .$cot2. " like '%" .$tukhoa2. "%' AND tacdung." .$cot1. " like '%" .$tukhoa1. "%' ORDER BY tacdung.maTacDung";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã tác dụng</th>";
        echo "<th>Tên tác dụng</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maTacDung']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maTacDung']). "</td>";
                echo "<td><a href='chitiettacdung.php?maTacDung=" .$rows['maTacDung']. "'>" .$rows['tenTacDung']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
    if($loai1 == 5&&$loai2 == 2){
        $sql = "SELECT * FROM tacdung LEFT JOIN caythuoctacdung ON tacdung.maTacDung = caythuoctacdung.maTacDung LEFT JOIN caythuoc ON caythuoctacdung.maCayThuoc=caythuoc.maCayThuoc WHERE caythuoc." .$cot2. " like '%" .$tukhoa2. "%' AND tacdung." .$cot1. " like '%" .$tukhoa1. "%' ORDER BY tacdung.maTacDung";
        $doituong->query($sql);
        
        $data = array();
        echo($sql);
        echo "<table border='1'><tr>";
        echo "<th>Mã tác dụng</th>";
        echo "<th>Tên tác dụng</th></tr>";
        $last = "";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            $now = intVal($rows['maTacDung']);
            if($now != $last){
                $last = $now;
                echo "<tr><td class='table-STT'>" .intVal($rows['maTacDung']). "</td>";
                echo "<td><a href='chitiettacdung.php?maTacDung=" .$rows['maTacDung']. "'>" .$rows['tenTacDung']. "</a></td></tr>";
            }
        }
        echo "</table>";
    }
?>