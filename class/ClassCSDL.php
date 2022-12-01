
<?php 

	class ClassCSDL
	{

		public $idtable, $tablename,$classtable,$statustable,$data,$databasename,$columnname;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setTableName($tablename)
		{
			$this->tablename=$tablename;
		}
		function getTableName(){
			return $this->tablename;
		}
		function setDataBaseName($databasename)
		{
			$this->databasename=$databasename;
		}
		function getDataBaseName(){
			return $this->databasename;
		}
		function setColumnName($columnname)
		{
			$this->columnname=$columnname;
		}
		function getColumnName(){
			return $this->columnname;
		}
		function setIDTable($idtable)
		{
			$this->idtable=$idtable;
		}
		function getIDTable(){
			return $this->idtable;
		}
		function setClassTable($classtable)
		{
			$this->classtable=$classtable;
		}
		function getClassTable(){
			return $this->classtable;
		}
		function setStatusTable($statustable)
		{
			$this->statustable=$statustable;
		}
		function getStatusTable(){
			return $this->statustable;
		}
		function setData($data)
		{
			$this->data=$data;
		}
		function getData(){
			return $this->data;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);        	
        }
        public function SoDong(){
        	$sql='select * from csdl';
        	ClassPoster::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function layDuLieu(){
        		$c = ClassConnect::Connect();
        		$sql='SELECT * FROM INFORMATION_SCHEMA.TABLES where table_schema = "pphim.org_vs2"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassCSDL;
	        			
						$tk->setTableName($row->table_name);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        public function layAllDataTable($table){
        		$c = ClassConnect::Connect();
        		$sql='SELECT * FROM '.$table;
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			//$tk = new ClassCSDL;
						
	        			$arr[]=$row;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        
        public function layTenBang(){
        		$c = ClassConnect::Connect();
        		$sql='SELECT table_name FROM INFORMATION_SCHEMA.TABLES where table_schema = "pphim.org_vs2"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassCSDL;
	        			
						$tk->setTableName($row->table_name);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }

        public function layTenBangTheoDatabaseName($databasename){
        		$c = ClassConnect::Connect();
        		$sql='SELECT table_name FROM INFORMATION_SCHEMA.TABLES where table_schema = "'.$databasename.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			$tk = new ClassCSDL;
						$tk->setTableName($row->table_name);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        public function update($db,$tb,$cl,$id,$idn,$vl){
        	if ($db!=""&&$tb!=""&&$cl!=""&&$id!=""&&$idn!="") {
        		$c = ClassConnect::Connect();
        		$sql_check_id='select `'.$idn.'` from `'.$db.'`.`'.$tb.'` where `'.$idn.'` ="'.$id.'"';
		        $result=  mysqli_query($c,$sql_check_id);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){
		        	$sql='UPDATE `'.$db.'`.`'.$tb.'` SET `'.$cl.'` = "'.$vl.'" WHERE  `'.$idn.'`="'.$id.'"';
		        	$kq = mysqli_query($c,$sql);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Sửa không thành công, lỗi SQL </br>';
				    }
		        }else{
		        	return 'Sửa không thành công, id không tồn tại';
		        }
        	}else{
        		return 'csdl, table, tên cột, tên id, id không được để trống';
        	}
        		$c = ClassConnect::Connect();
        		$sql='SELECT table_name FROM INFORMATION_SCHEMA.TABLES where table_schema = "'.$databasename.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			$tk = new ClassCSDL;
						$tk->setTableName($row->table_name);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        public function selectColumnNameinDatabaseAndTable($databasename,$tablename){
        		$c = ClassConnect::Connect();
        		$sql='SELECT column_name FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = "'.$databasename.'" AND TABLE_NAME = "'.$tablename.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			$tk = new ClassCSDL;
						$tk->setColumnName($row->column_name);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        public function selectAllDatabase(){
        		$c = ClassConnect::Connect();
        		$sql='SELECT schema_name FROM information_schema.schemata where schema_name not in ("information_schema","mysql","performance_schema","phpmyadmin")';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			$tk = new ClassCSDL;
						$tk->setDataBaseName($row->schema_name);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        public function NapSQL($sql){
        	if ($sql!='') {
        		$c1 = ClassConnect::Connect();		       
		        $kq=  mysqli_query($c1,$sql);		        
		        if($kq){
		        	return $kq;
		        }else{
		        	return 'Lỗi sql: ';
		        }
        	}else{
        		return 'SQL Trống';
        	}	    	
	    }
	    public function runMysql($sql){
	    	$c = ClassConnect::Connect();
	    	if ($sql!='') {
	    		$result=mysqli_query($c,$sql);
	    		if(mysqli_num_rows($result)>0){
	    			$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			array_push($arr,$row);
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: mysqli_num_rows';
	        	} 
	    	}else{
	    		return 0;
	    	}
	    }
	}
 ?>

