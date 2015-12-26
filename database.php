<?php
	class database{

		public $host = 'localhost';
		public $user = 'root';
		public $pass = '12345678';
		public $dbName = 'thuocdongy';

		public $conn = NULL;
		public $result = NULL;

		public function connect(){
			$this->conn = mysql_connect($this->host, $this->user, $this->pass);
			if($this->conn){
				$selectDB = mysql_select_db($this->dbName, $this->conn);
				if($selectDB){
					mysql_query("SET NAMES 'utf8'");
				}else{
					echo 'database not found';
				}
			}else{
				echo 'Not connect to database';
			}
		}

		public function query($sql){
			$this->free_query();
			$this->result = mysql_query($sql);
		}

		public function free_query(){
			if($this->result){
				@mysql_free_result($this->result);
			}
		}

		public function num_rows(){
			if($this->result){
				$num = mysql_num_rows($this->result);
				return $num;
			}
		}

		public function fetch(){
			if($this->result){
				$rows = mysql_fetch_array($this->result);
				return $rows;
			}
		}
	}

?>