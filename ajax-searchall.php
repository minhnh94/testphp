<?php
    include_once 'database.php';
    include_once 'doituong.php';
    $doituong = new doituong();
    
    $cot = $_GET['by'];
    $bang = $_GET['type'];
    $tukhoa = $_GET['keyword'];
    $loai = $_GET['table'];
    $sql = "select * from " .$bang. " where " .$cot. " like '%" .$tukhoa. "%'";
    
    $doituong->query($sql);
    $data = array();
    echo($sql);
    switch (intval($loai)) {
    case 1:
        echo "<table border='1'><tr>";
        echo "<th>Mã bài thuốc</th>";
        echo "<th>Tên bài thuốc</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maBaiThuoc']). "</td>";
            echo "<td><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td></tr>";
        }
        echo "</table>";

        break;
    case 2:
        echo "<table border='1'><tr>";
        echo "<th>Mã cây thuốc</th>";
        echo "<th>Tên cây thuốc</th>";
        echo "<th>Mô tả</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maCayThuoc']). "</td>";
            echo "<td><a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows['tenCayThuoc']. "</a></td>";
            echo "<td>" .$rows['moTa']. "</td></tr>";
        }
        echo "</table>";

        break;
    case 3:
        echo "<table border='1'><tr>";
        echo "<th>Mã vị thuốc</th>";
        echo "<th>Tên vị thuốc</th>";
        echo "<th>Chủ trị</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maViThuoc']). "</td>";
            echo "<td><a href='chitietvithuoc.php?maViThuoc=" .$rows['maViThuoc']. "'>" .$rows['tenViThuoc']. "</a></td>";
            echo "<td>" .$rows['chuTri']. "</td></tr>";
        }
        echo "</table>";

        break;
    case 4:
        echo "<table border='1'><tr>";
        echo "<th>Mã Bệnh</th>";
        echo "<th>Tên bệnh</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maBenh']). "</td>";
            echo "<td><a href='chitietbenh.php?maBenh=" .$rows['maBenh']. "'>" .$rows['tenBenh']. "</a></td></tr>";
        }
        echo "</table>";

        break;
    case 5:
        echo "<table border='1'><tr>";
        echo "<th>Mã tác dụng</th>";
        echo "<th>Tên tác dụng</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maTacDung']). "</td>";
            echo "<td><a href='chitiettacdung.php?maTacDung=" .$rows['maTacDung']. "'>" .$rows['tenTacDung']. "</a></td></tr>";
        }
        echo "</table>";

        break;
    case 6:
        echo "<table border='1'><tr>";
        echo "<th>Mã bài viết</th>";
        echo "<th>Tên bài viết</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maBaiViet']). "</td>";
            echo "<td><a href='chitietbaiviet.php?maBaiViet=" .$rows['maBaiViet']. "'>" .$rows['tenBaiViet']. "</a></td></tr>";
        }
        echo "</table>";

        break;

    default:
        break;
    }
?>
