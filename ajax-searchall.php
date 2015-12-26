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
        echo "<table border='1'>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td rowspan='2' class='table-STT'>" .$rows['maBaiThuoc']. "</td>";
            echo "<td colspan='2' class='table-title'><a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows['maBaiThuoc']. "'>" .$rows['tenBaiThuoc']. "</a></td>";
            echo "</tr><tr><td class='table-detail'>" .$rows['moTaTacDung']. "</td>";
            echo "<td class='table-detail'>" .$rows['cachDung']. "</td></tr>";
        }
        echo "</table>";

        break;
    case 2:
        echo "<table border='1'><tr>";
        echo "<th>Mã cây thuốc</th>";
        echo "<th>Tên cây thuốc</th>";
        echo "<th>Mô tả</th>";
        echo "<th>Chủ trị</th></tr>";
        while($row = $doituong->fetch()){
            $data[] = $row;
        }
        foreach($data as $rows){
            echo "<tr><td class='table-STT'>" .intVal($rows['maCayThuoc']). "</td>";
            echo "<td><a href='chitietcaythuoc.php?maCayThuoc=" .$rows['maCayThuoc']. "'>" .$rows['tenCayThuoc']. "</a></td>";
            echo "<td>" .$rows['moTa']. "</td>";
            echo "<td>" .$rows['chuTri']. "</td></tr>";
        }
        echo "</table>";

        break;

    default:
        break;
    }
?>
