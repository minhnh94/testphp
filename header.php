<style>
    .no-border {
        border: none!important;
    }
    .left-header-td {
        text-align: right;
        font-size: 200%;
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top my-navbar">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand mynavbar-brand" href="index.php"><img src="img/icon32.png"/>Đông Y Online</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="baithuoc.php">BÀI THUỐC</a></li><div class="nav-content" id="baithuoc-newest">
                    <table class="no-border">
                        <tr class="tr-header no-border">
                            <td class="left-header-td no-border"><b>CÁC BÀI THUỐC MỚI ĐƯỢC ĐÓNG GÓP</b></td>
                            <?php
                                include_once 'database.php';
                                include_once 'bthuoc.php';
                                $bthuoc2 = new bthuoc();
                                $sql2 = "SELECT * FROM baithuoc ORDER BY maBaiThuoc DESC LIMIT 4";
                                $bthuoc2->query($sql2);
                                $data2 = array();
                                while($row2 = $bthuoc2->fetch()){
                                    $data2[] = $row2;
                                }
                                $i=0;
                                foreach($data2 as $rows2){
                                    $i++;
                            ?>
                            <td class="no-border"><center><?php echo "<a href='binhluanbaithuoc.php?maBaiThuoc=" .$rows2['maBaiThuoc']. "'>"; ?><div class="news-detail">
                                    <div class="news-detail-content"><?php echo "<img src='./img/b" .$i. ".jpg'>";?></div>
                                    <div class="news-detail-title"><?php echo $rows2['tenBaiThuoc'];?></div>
                            </div></a></center></td>
                            <?php
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <li><a href="caythuoc.php">CÂY THUỐC</a></li><div class="nav-content" id="caythuoc-newest">
                    <table class="no-border">
                        <tr class="tr-header no-border">
                            <td class="left-header-td no-border"><b>CÙNG KHÁM PHÁ ĐÔNG Y QUA CÁC CÂY THUỐC VÀ VỊ THUỐC</b></td>
                            <?php
                                include_once 'cthuoc.php';
                                $cthuoc2 = new cthuoc();
                                $ran = rand(1,149);
                                for ($j = 0;$j<4;$j++){
                                    $ma = $ran + $j;
                                    $sql3 = "SELECT * FROM caythuoc WHERE maCayThuoc ='" .$ma. "'";
                                    $cthuoc2->query($sql3);
                                    $row3 = $cthuoc2->fetch();
                            ?>
                            <td class="no-border"><center><?php echo "<a href='chitietcaythuoc.php?maCayThuoc=" .$row3['maCayThuoc']. "'>"; ?><div class="news-detail">
                                    <div class="news-detail-content"><?php echo "<img src='./img/c" .($j+1). ".jpg'>";?></div>
                                    <div class="news-detail-title"><?php echo $row3['tenCayThuoc'];?></div>
                            </div></a></center></td>
                            <?php
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <li><a href="benh.php">BỆNH</a></li><div class="nav-content" id="benh-newest">
                    <table class="no-border">
                        <tr class="tr-header no-border">
                            <td class="left-header-td no-border"><b>TÌM HIỂU VỀ CÁC BỆNH VÀ CÁCH CHỮA CHÚNG</b></td>
                            <?php
                                $cthuoc3 = new cthuoc();
                                $ran2 = rand(1,57);
                                for ($k = 0;$k<4;$k++){
                                    $ma2 = $ran2 + $k;
                                    $sql4 = "SELECT * FROM benh WHERE maBenh ='" .$ma2. "'";
                                    $cthuoc3->query($sql4);
                                    $row4 = $cthuoc3->fetch();
                            ?>
                            <td class="no-border"><center><?php echo "<a href='chitietbenh.php?maBenh=" .$row4['maBenh']. "'>"; ?><div class="news-detail">
                                    <div class="news-detail-content"><center><?php echo "<img src='./img/b" .($k+1). ".png'>";?></center></div>
                                    <div class="news-detail-title"><?php echo $row4['tenBenh'];?></div>
                            </div></a></center></td>
                            <?php
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <li><a href="baiviet.php">CÁC BÀI VIẾT KHÁC</a></li><div class="nav-content" id="baiviet-newest">
                    <table class="no-border">
                        <tr class="tr-header no-border">
                            <td class="left-header-td no-border"><b>CÁC BÀI VIẾT MỚI NHẤT</b></td>
                            <?php
                                $bthuoc3 = new bthuoc();
                                $sql5 = "SELECT * FROM baiviet ORDER BY maBaiViet DESC LIMIT 4";
                                $bthuoc3->query($sql5);
                                $data6 = array();
                                while($row6 = $bthuoc3->fetch()){
                                    $data6[] = $row6;
                                }
                                foreach($data6 as $rows6){
                            ?>
                            <td class="no-border"><center><?php echo "<a href='chitietbaiviet.php?maBaiViet=" .$rows6['maBaiViet']. "'>"; ?><div class="news-detail">
                                    <div class="news-detail-content"><?php echo "<img src='" .$rows6['anhMinhHoa']. "' alt='Vui lòng kết nối Internet để xem ảnh'>";?></div>
                                    <div class="news-detail-title"><?php echo $rows6['tenBaiViet'];?></div>
                            </div></a></center></td>
                            <?php
                                }
                            ?>
                        </tr>
                    </table>
                </div>
            </ul>
            <div class="my-search-area">
                <form id="search-form" name="search-form" class="form-inline" method="post" action="result.php">
                    <input type="text" name="keyword" id="keyword" class="form-control mySearchField" size="20" placeholder="Nhập từ khóa ..." required>
                    <button type="submit" class="btn mySearchBtn"><img src="img/search24.png"/></button>
                </form>
            </div>
        </div>
    </div>
</nav>
