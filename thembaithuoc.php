<?php
	include_once('database.php');
	class baithuoc extends database{
		protected $tenBaiThuoc = NULL;
		protected $moTaTacDung = NULL;
		protected $maBenh = NULL;
		protected $cachDung = NULL;
		protected $trangThai = NULL;
		protected $anhBaiThuoc = NULL;
		protected $maBaiThuoc = NULL;
		protected $maCayThuoc = NULL;
		public function __construct(){
			$this->connect();
			}
			
		public function get_all($table){
        $sql = "SELECT * FROM $table";
        $this->query($sql);
        $data = array();
        while($rows = $this->fetch()){
            $data[] = $rows;
            
        }
        return $data;
        
    }
	// them vao csdl
	public function add_baithuoc($maCayThuoc){
            $sql = "SELECT * FROM baithuoc WHERE tenBaiThuoc = '$this->tenBaiThuoc'";
            $this->query($sql);
            if($this->num_row() > 0){
                return 'user exist';
            }else{
                $sql = "INSERT INTO baithuoc(tenBaiThuoc,moTaTacDung,maBenh,cachDung,trangThai,anhBaiThuoc) VALUES ('$this->tenBaiThuoc','$this->moTaTacDung','$this->maBenh','$this->cachDung','$this->trangThai','$this->anhBaiThuoc')";
                $this->query($sql);
				$sql2 = 'select maBaiThuoc from baithuoc order by maBaiThuoc desc limit 0,1';
				$this->query();
				$sql3 = '';
            }
        }
	
		}
?>