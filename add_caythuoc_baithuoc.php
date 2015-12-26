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
            include_once('header.php');
	?>
        <div class="white-trans-container">
        <?php
            include_once('database.php');
            //include_once('thembaithuoc.php');
        ?>
<?php

    $mangbt;
    $mangct;
    $arr='';
    $bien=0;
    $sql='select * from caythuoc,baithuoccaythuoc where caythuoc.maCayThuoc=baithuoccaythuoc.maCayThuoc';
    $caythuoc=mysql_query($sql);
    while($dong=mysql_fetch_array($caythuoc)){
        $mangbt[$bien]=$dong['maBaiThuoc'];
        $mangct[$bien]=$dong['maCayThuoc'].'. '.$dong['tenCayThuoc'].': '.$dong['khoiLuong'];
        $bien++;
    }
    $bt='';
    $ct='';
    if(isset($mangbt)){
        foreach ($mangbt as $value) {
            $bt=$bt.$value.'#';     
        }
    }
    if(isset($mangct)){
        foreach ($mangct as $value) {
            $ct=$ct.$value.'#';     
        }
    }
    ?>
        <form name='f1'>
            <input type='hidden' name='vd' value='<?php echo $bt; ?>'>
            <input type='hidden' name='vd1' value='<?php echo $ct; ?>'>
        </form>
<script>
            function xly(){
                vidu=document.f1.vd.value;
                vidu1=document.f1.vd1.value;
                for(j=document.f.caythuocdachon.length-1; j>=0; j--)
                //  if(document.f.caythuocdachon[j].selected==true) 
                        f.caythuocdachon.options.remove(j);
                s=document.f.baithuoc.value;
                s2 =s.split(".");
                vd=vidu.split('#');
                vd1=vidu1.split('#');
                for(j=0;j<vd.length-1;j++){
                    if(vd[j]==s2[0]){
                        var option=document.createElement('option');
                        option.text=vd1[j];
                        f.caythuocdachon.options.add(option);
                    }
                }
                    
                 
            }
            function xly1(){
                s=document.f.caythuoc.value;
                for(j=0; j<document.f.caythuocdachon.length; j++){
                    s1=document.f.caythuocdachon[j].value;
                    s2 =s1.split(".");
                    if(s2[0]==s){
                        f.caythuocdachon.options.remove(j)
                    }
                }
                s=s+':'+document.f.khoiluong.value;
                var option=document.createElement('option');
                option.text=s;
                f.caythuocdachon.options.add(option);
            }
            function xly2(){
                for(j=document.f.caythuocdachon.length-1; j>=0; j--)
                    if(document.f.caythuocdachon[j].selected==true) 
                        f.caythuocdachon.options.remove(j);
            }
            function xly3(){
                s='';
                for(j=0; j<document.f.caythuocdachon.length; j++)
                    s+=document.f.caythuocdachon[j].value+'#';
                
                document.f.themBT.value=s;
            }
            function xly4(){
                var searchValue=document.getElementById('timkiem').value.toUpperCase();
                var from_s=document.getElementById('caythuoc');
                for(var i=0; i<from_s.options.length-1; i++){
                    var st=from_s.options[i].text.toUpperCase();
                    if(st.search(searchValue)>-1){
                        var temp=from_s.options[i];
                        from_s.add(temp,from_s.options[0]);
                    }
                }
            }
            function xly5(){
                var searchValue=document.getElementById('timkiem1').value.toUpperCase();
                
                    var from_s=document.getElementById('baithuoc');
                    for(var i=0; i<from_s.options.length; i++){
                        var st=from_s.options[i].text.toUpperCase();
                        if(st.search(searchValue)>-1){
                            var temp=from_s.options[i];
                            from_s.add(temp,from_s.options[0]);
                        }
                    }
                 
            }
            function xly6(){
                var searchValue=document.getElementById('timkiem1').value;
                if(searchValue=='Nhập bài thuốc cần tìm kiếm'){
                    document.getElementById('timkiem1').value='';
                }else{
                    document.getElementById('timkiem1').value='Nhập bài thuốc cần tìm kiếm';
                }
            }
</script>
<?php 
    //include("modules/editor/editor.php");
    $sql="SELECT * FROM `baithuoc`";
    $baithuoc=mysql_query($sql);
    $sql2="SELECT * FROM caythuoc";
    $caythuoc=mysql_query($sql2);
    
    /*while($dong=mysql_fetch_array($caythuoc)){
        $arr=$arr.$dong['maCayThuoc'].'. '.$dong['tenCayThuoc'].'#';
        ?>
        <form name='f2'>
            <input type='hidden' name='arr' value='<?php echo $arr; ?>'>
        </form>
        <?php
    }*/
?>
<style>
.baithuoc{
    width:25%;
    float:left;
}
.tacdung{
    float:left; 
}
.caythuoc{
    float:left;
    width:300px;
}
.khoiluong{
    float:left;
    width:200px;
    margin-left:20px;
}
.thanhphan{
    width:250px;
    float:left;
}
</style>
<div class='theForm'>
    <form name='f' action='xuly.php' method='post'>
         <input type='hidden' name='themBT'>
         
        <p class='tieude'>CHỨC NĂNG THÊM MỚI BÀI THUỐC CÂY THUỐC</p>
        
        <div class="baithuoc">
        <p>Tên bài thuốc</p>
            <input type='text' name='timkiem1' value='Nhập bài thuốc cần tìm kiếm' id='timkiem1' style='width:80%; margin-bottom: 10px;float:left;' onclick='xly6();' onkeyup='xly5();' >
            <br>
            <br>
            <div class='tacdung'>
                <select name='baithuoc' id='baithuoc' size='10' onclick='xly();' multiple> 
                    <?php while($dong=mysql_fetch_array($baithuoc)){ ?>
                        <option name='<?php echo $dong['maBaiThuoc']; ?>'><?php echo $dong['maBaiThuoc']; ?>. <?php echo $dong['tenBaiThuoc']; ?></option>
                        
                    <?php } ?>
                    <option  name=''></option>
                </select>
            </div>
        </div>
        
            <div class="caythuoc">
                <p>Tên cây thuốc</p> 
                <input type='text' name='timkiem' id='timkiem' style='width:90%; margin-bottom: 10px;'onkeyup='xly4();' >
                <div class='tacdung'>
                    <select name='caythuoc' id='caythuoc'size='10' multiple> 
                    
                        <?php while($dong=mysql_fetch_array($caythuoc)){ ?>
                            <option name='<?php echo $dong['maCayThuoc']; ?>'><?php echo $dong['maCayThuoc']; ?>. <?php echo $dong['tenCayThuoc']; ?></option>
                        <?php } ?>
                        <option  name=''></option>
                    </select>
                
                </div>
            </div>
        
        <div class="khoiluong">
            <p>Khối lượng</p>
            <div class='tacdung'>
                <input type='text' name='khoiluong' style='width:90%;'>
                <input type='button' name='chon' value='Thêm' style='width:30%; margin-top: 7px;' onclick='xly1();'>
            </div>
        </div>
        <div class="thanhphan">
            <p>Thành phần trong bài thuốc</p>
        <div class='tacdung'>
        
            <select name='caythuocdachon' size='18' onclick='xly6();'> 
                
            </select>
            <input type='button' name='xoa' value='Xóa' style='width:80%; margin-top: 52px; margin-left: 7px;' onclick='xly2();'>
        </div>
        
        <div class='submit' style='margin-top:0px;'><input type='submit' name='them' class='them' value='Cập nhật' style='width:80px; margin-left:144px;margin-top:5px;' onclick='xly3();'> </div>
        </div>
        
     
    </form>
</div>
        
        </div>
        <?php
            include_once('footer.php');
	?>
    </body>
</html>