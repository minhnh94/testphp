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
        
</head>
    <body>
        <div class="white-trans-container">
        <?php            
            if(empty($_SESSION['user_name'])){
                header('Location: login-require.php');
            } else {
                include_once('header.php');
            }
            ob_start();
            include '__autoload.php';
	?>
            <div class="search-panel">
                <div class="header-panel">
                    <h3>TÌM KIẾM NÂNG CAO</h3>
                </div>
                <table class="search-table">
                    <tr class="no-border-padding5">
                        <td class="left-td no-border-padding5">Từ khóa 1</td>
                        <td class="no-border-padding5"><input type="text" id="keyword1" class="search-field"/></td>
                        <td class="no-border-padding5">
                            <select id="by1" class="search-type">
                                <option value="1">Tên</option>
                                <option value="2">ID</option>
                            </select>
                        </td>
                        <td class="no-border-padding5">
                            <select id="type1" class="search-type">
                                <option class="none-opt">[--Chọn tiêu chí chính--]</option>
                                <option value="1">Bài thuốc</option>
                                <option value="2">Cây thuốc</option>
                                <option value="3">Vị thuốc</option>
                                <option value="4">Bệnh</option>
                                <option value="5">Tác dụng</option>
                                <option value="6">Bài viết</option>
                            </select>
                        </td>
                    </tr>
                        <tr class="no-border-padding5">
                        <td class="left-td no-border-padding5">Từ khóa 2</td>
                        <td class="no-border-padding5"><input type="text" id="keyword2" class="search-field"/></td>
                        <td class="no-border-padding5">
                            <select id="by2" class="search-type">
                                <option value="1">Tên</option>
                                <option value="2">ID</option>
                            </select>
                        </td>
                        <td class="no-border-padding5">
                            <select id="type2" class="search-type">
                                <option class="none-opt">[--Chọn tiêu chí phụ--]</option>
                                <option value="1">Bài thuốc</option>
                                <option value="2">Cây thuốc</option>
                                <option value="3">Vị thuốc</option>
                                <option value="4">Bệnh</option>
                                <option value="5">Tác dụng</option>
                                <option value="6">Bài viết</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <center><button onclick="search()">TÌM KIẾM</button></center><br>
            </div><br><br>
            
            <div class="search-panel">
                <div class="header-panel">
                    <h3>KẾT QUẢ</h3>
                </div>
                <div id="search-result">
                    
                </div>
            </div>
        
        <?php
            include_once('footer.php');
	?>
        </div>
    </body>
    <script>							
            function search() {
                var match = [[1,2],[1,4],[1,5],[2,1],[2,3],[2,4],[2,5],[3,2],[4,1],[4,2],[5,1],[5,2]];
                var keyword1 = document.getElementById("keyword1").value;
                var by1 = document.getElementById("by1");
                var type1 = document.getElementById("type1");
                
                var keyword2 = document.getElementById("keyword2").value;
                var by2 = document.getElementById("by2");
                var type2 = document.getElementById("type2");
                
		var selectedType1 = type1.selectedIndex;
                var selectedType2 = type2.selectedIndex;
                if(selectedType1 == 0){
                    alert("Bạn chưa chọn tiêu chí tìm kiếm chính!");
                    return 0;
                }
                if(selectedType2 == 0){
                    var urlString = "ajax-searchall.php?";
                    var by = "";
                    if(by1.selectedIndex == 0){
                        by = "ten";
                    } else {
                        by = "ma";
                    }
                    var type = "";
                    switch(selectedType1){
                        case 1:
                            type = "baithuoc";
                            by += "BaiThuoc";
                            break;
                        case 2:
                            type = "caythuoc";
                            by += "CayThuoc";
                            break;
                        case 3:
                            type = "vithuoc";
                            by += "ViThuoc";
                            break;
                        case 4:
                            type = "benh";
                            by += "Benh";
                            break;
                        case 5:
                            type = "tacdung";
                            by += "TacDung";
                            break;
                        case 6:
                            type = "baiviet";
                            by += "BaiViet";
                            break;
                        default:
                            break;
                    }
                    urlString += "by=" + by + "&type=" + type + "&keyword=" + keyword1 + "&table=" + selectedType1;
//                    alert(urlString);
                    var request = $.ajax({
                        url: "" + urlString,
                        type: "GET",			
                        dataType: "html"
                    });
                    
                    request.done(function(msg) {
                        $("#search-result").html(msg);			
                    });

                    request.fail(function(jqXHR, textStatus) {
                        alert( "Request failed: " + textStatus );
                    });
                } else {
                    canMatch = 0;
                    for(i=0;i<match.length;i++){
                        if(selectedType1 == match[i][0]){
                            if(selectedType2 == match[i][1]){
                                canMatch = 1;
                                break;
                            }
                        }
                    }
//                    alert(canMatch);
                    if(canMatch == 0){
                        $("#search-result").html("Không thể tìm kiếm với đồng thời hai tiêu chí đã chọn. Hãy chọn tiêu chí khác hoặc bỏ tiêu chí phụ.");
                    } else {
                        var urlString = "ajax-search.php?";
                        var theo1 = "";
                        var theo2 = "";
                        if(by1.selectedIndex == 0){
                            theo1 = "ten";
                        } else {
                            theo1 = "ma";
                        }
                        if(by2.selectedIndex == 0){
                            theo2 = "ten";
                        } else {
                            theo2 = "ma";
                        }
                        var bang1 = "";
                        var bang2 = "";
                        switch(selectedType1){
                            case 1:
                                bang1 = "baithuoc";
                                theo1 += "BaiThuoc";
                                break;
                            case 2:
                                bang1 = "caythuoc";
                                theo1 += "CayThuoc";
                                break;
                            case 3:
                                bang1 = "vithuoc";
                                theo1 += "ViThuoc";
                                break;
                            case 4:
                                bang1 = "benh";
                                theo1 += "Benh";
                                break;
                            case 5:
                                bang1 = "tacdung";
                                theo1 += "TacDung";
                                break;
                            case 6:
                                bang1 = "baiviet";
                                theo1 += "BaiViet";
                                break;
                            default:
                                break;
                        }
                        switch(selectedType2){
                            case 1:
                                bang2 = "baithuoc";
                                theo2 += "BaiThuoc";
                                break;
                            case 2:
                                bang2 = "caythuoc";
                                theo2 += "CayThuoc";
                                break;
                            case 3:
                                bang2 = "vithuoc";
                                theo2 += "ViThuoc";
                                break;
                            case 4:
                                bang2 = "benh";
                                theo2 += "Benh";
                                break;
                            case 5:
                                bang2 = "tacdung";
                                theo2 += "TacDung";
                                break;
                            case 6:
                                bang2 = "baiviet";
                                theo2 += "BaiViet";
                                break;
                            default:
                                break;
                        }
                        urlString += "theo1=" + theo1 + "&bang1=" + bang1 + "&theo2=" + theo2 + "&bang2=" + bang2 + "&keyword1=" + keyword1 + "&keyword2=" + keyword2 + "&table1=" + selectedType1 + "&table2=" + selectedType2;
                        alert(urlString);
                        var request = $.ajax({
                            url: "" + urlString,
                            type: "GET",			
                            dataType: "html"
                        });

                        request.done(function(msg) {
                            $("#search-result").html(msg);			
                        });

                        request.fail(function(jqXHR, textStatus) {
                            alert( "Request failed: " + textStatus );
                        });
                    }
                    
//                var request = $.ajax({
//                    url: "ajax.php",
//                    type: "GET",			
//                    dataType: "html"
//                });
//
//		request.done(function(msg) {
//                    $("#search-result").html(msg);			
//                });
//
//                request.fail(function(jqXHR, textStatus) {
//                    alert( "Request failed: " + textStatus );
//		});
                }
            }
        </script>
</html>