<?php 

	class ClassFilter_2
	{

		public $id_filter, $tenfilter, $subfilter, $valuefilter,$status;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDFilter($id_filter)
		{
			$this->id_filter=$id_filter;
		}
		function getIDFilter(){
			return $this->id_filter;
		}
		
		function setTenFilter($tenfilter){
			$this->tenfilter=$tenfilter;
		}
		function getTenFilter(){
			return $this->tenfilter;
		}
		function setSubFilter($subfilter){
			$this->subfilter=$subfilter;
		}
		function getSubFilter(){
			return $this->subfilter;
		}
		function setValueFilter($valuefilter){
			$this->valuefilter = $valuefilter;
		}
		function getValueFilter(){
			return $this->valuefilter;
		}
		function setStatus($status){
			$this->status = $status;
		}
		function getStatus(){
			return $this->status;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from filter_2';
        	ClassFilter::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemSoFilterDisable(){
        	$sql='select * from filter_2 where status = 0';
        	ClassFilter::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
       
        public function layDuLieu(){
        	$c = ClassConnect::Connect();
        	$sql='select * from filter_2 where status !=0';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassFilter_2;
	        		$tk->setIDFilter($row->id_filter);
					$tk->setTenFilter($row->tenfilter);
					$tk->setSubFilter($row->subfilter);
					$tk->setValueFilter($row->valuefilter);
					$tk->setStatus($row->status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
        function layNhomTheoSubFilter($subfilter){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='SELECT * FROM `filter_2` where subfilter="'.$subfilter.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter_2;
	        			$tk->setIDFilter($row->id_filter);
						$tk->setTenFilter($row->tenfilter);
						$tk->setSubFilter($row->subfilter);
						$tk->setValueFilter($row->valuefilter);
						$tk->setStatus($row->status);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layFilterTheoID($idfilter){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from filter_2 where id_filter ="'.$idfilter.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter_2;
	        			$tk->setIDFilter($row->id_filter);
						$tk->setTenFilter($row->tenfilter);
						$tk->setSubFilter($row->subfilter);
						$tk->setValueFilter($row->valuefilter);
						$tk->setStatus($row->status);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layFilterTheoTenFilter($tenfilter){
        	
        		$c = ClassConnect::Connect();
        		$sql='select * from filter_2 where tenfilter ="'.$tenfilter.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter_2;
	        			$tk->setIDFilter($row->id_filter);
						$tk->setTenFilter($row->tenfilter);
						$tk->setSubFilter($row->subfilter);
						$tk->setValueFilter($row->valuefilter);
						$tk->setStatus($row->status);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	} 
	           	
        }
        public function layNhomFilter(){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select distinct tenfilter from filter_2';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter_2;
	        			$tk->setTenFilter($row->tenfilter);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }

        public function ktFilterLaTable($idfilter){
	    	$c1 = ClassConnect::Connect();
	        $query='select id_filter from filter_2 where id_filter ="'.$id_filter.'" and valuefilter = "table"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	
	        if($num>0){return 1;}
	        else{return 0;}
	    }
        function themFilter($tenfilter, $subfilter, $value, $status){
        	if (ClassFilter::ktFilterTheoFilter($filter)!= 1) {
        		       			
	        		$c = ClassConnect::Connect();
				    $query='INSERT INTO `filter_2`(`tenfilter`, `subfilter`, `valuefilter`, `status`) VALUES ("'.$tenfilter.'","'.$subfilter.'","'.$value.'","'.$status.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				
        	}else{
        		return ' -Filter đã tồn tại </br>';
        	}	         	
	    }
	    function suaFilter ($id_filter, $tenfilter, $subfilter, $value, $status){
        	if (ClassFilter::ktFilter($id_filter)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `filter_2` SET `tenfilter`="'.$tenfilter.'",`subfilter`="'.$subfilter.'",`valuefilter`="'.$value.'",`status`="'.$status.'" WHERE `id_filter`='.$id_filter;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Sữa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Filter không tồn tại </br>';
        	}	         	
	    }
	    function xoaTheLoai($id_filter){
        	if (ClassFilter::ktFilter($id_filter)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `filter_2` WHERE `id_filter`='.$id_filter;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Filter không tồn tại </br>';
        	}	         	
	    }
	    public function ktFilter($id_filter){
	    	$c1 = ClassConnect::Connect();
	        $query='select id_filter from filter_2 where id_filter ="'.$id_filter.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function xulykeywordfilter ($keywork){ 
			$str = str_replace('/',',',$keywork);
			$str = strtolower($str);		 
			return $str;			 
		}
	}
 ?>

