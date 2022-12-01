<?php 

	class ClassFilter
	{

		public $id_filter, $tenfilter, $filter, $link, $status, $querysearch;
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
		function setFilter($filter){
			$this->filter=$filter;
		}
		function getFilter(){
			return $this->filter;
		}
		function setLink($link){
			$this->link = $link;
		}
		function getLink(){
			return $this->link;
		}
		function setQuerySearch($querysearch){
			$this->querysearch = $querysearch;
		}
		function getQuerySearch(){
			return $this->querysearch;
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
        	$sql='select * from filter';
        	ClassFilter::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemSoFilterDisable(){
        	$sql='select * from filter where status = 0';
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
        	$sql='select * from filter where status !=0';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassFilter;
	        		$tk->setIDFilter($row->id_filter);
					$tk->setTenFilter($row->tenfilter);
					$tk->setFilter($row->filter);
					$tk->setLink($row->link);
					$tk->setQuerySearch($row->querysearch);
					$tk->setStatus($row->status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
        public function layTheLoaiTheoNhom($tenfilter){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from filter where tenfilter = "'.$tenfilter.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter;
	        			$tk->setIDFilter($row->id_filter);
						$tk->setTenFilter($row->tenfilter);
						$tk->setFilter($row->filter);
						$tk->setLink($row->link);
						$tk->setQuerySearch($row->querysearch);
						$tk->setStatus($row->status);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        function layTheLoaiTheoFilter($filter){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='SELECT * FROM `filter` where filter="'.$filter.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter;
	        			$tk->setIDFilter($row->id_filter);
						$tk->setTenFilter($row->tenfilter);
						$tk->setFilter($row->filter);
						$tk->setLink($row->link);
						$tk->setQuerySearch($row->querysearch);
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
        		$sql='select * from filter where id_filter ="'.$idfilter.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter;
	        			$tk->setIDFilter($row->id_filter);
						$tk->setTenFilter($row->tenfilter);
						$tk->setFilter($row->filter);
						$tk->setLink($row->link);
						$tk->setQuerySearch($row->querysearch);
						$tk->setStatus($row->status);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layNhomTheLoai(){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select distinct tenfilter from filter';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFilter;
	        			$tk->setTenFilter($row->tenfilter);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        function themFilter($tenfilter, $filter, $link, $querysearch, $status){
        	if (ClassFilter::ktFilterTheoFilter($filter)!= 1) {
        		       			
	        		$c = ClassConnect::Connect();
				    $query='INSERT INTO `filter`(`id_filter`, `tenfilter`, `filter`, `querysearch`, `link`, `status`) VALUES ("'.$tenfilter.'","'.$filter.'","'.$link.'","'.$querysearch.'","'.$status.'")';
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
	    function suaFilter ($id_filter, $tenfilter, $filter, $querysearch, $link, $status){
        	if (ClassFilter::ktFilter($id_filter)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `filter` SET `tenfilter`="'.$tenfilter.'",`filter`="'.$filter.'",`link`="'.$link.'",`querysearch`="'.$querysearch.'",`status`="'.$status.'" WHERE `id_filter`='.$id_filter;
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
			    $query='DELETE FROM `filter` WHERE `id_filter`='.$id_filter;
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
	        $query='select id_filter from filter where id_filter ="'.$id_filter.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function ktFilterTheoFilter($filter){
	    	$c1 = ClassConnect::Connect();
	        $query='select id_filter from theloai where filter ="'.$filter.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function xulykeywordfilter($keyword){
	    	$c1 = ClassConnect::Connect();
	        $sql='select querysearch from filter where link ="'.$keyword.'"';
	       	$result=mysqli_query($c1,$sql);
        	if(mysqli_num_rows($result)>0){	        		
	        	while ($row=mysqli_fetch_object($result)) {	        			
	        		$kq = $row->querysearch;	        			
	        	}
	        	return $kq;
	        }else{
	        	return ' - Lỗi SQL';
	        }
	    }
	    public function LayTenFilter($keyword){
	    	$c1 = ClassConnect::Connect();
	        $sql='select filter from filter where link ="'.$keyword.'"';
	       	$result=mysqli_query($c1,$sql);
        	if(mysqli_num_rows($result)>0){	        		
	        	while ($row=mysqli_fetch_object($result)) {	        			
	        		$kq = $row->filter;	        			
	        	}
	        	return $kq;
	        }else{
	        	return ' - Lỗi SQL';
	        }
	    }
	}
 ?>

