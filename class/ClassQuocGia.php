<?php 

	class ClassQuocGia
	{

		public $idquocgia, $tenquocgia, $sttquocgia, $ten_vn, $tag;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDQuocGia($idquocgia)
		{
			$this->idquocgia=$idquocgia;
		}
		function getIDQuocGia(){
			return $this->idquocgia;
		}
		function setTenQuocGia($tenquocgia)
		{
			$this->tenquocgia=$tenquocgia;
		}
		function getTenQuocGia(){
			return $this->tenquocgia;
		}
		function setSTTQuocGia($sttquocgia)
		{
			$this->sttquocgia=$sttquocgia;
		}
		function getSTTQuocGia(){
			return $this->sttquocgia;
		}
		function setTenVN($ten_vn)
		{
			$this->ten_vn=$ten_vn;
		}
		function getTenVN(){
			return $this->ten_vn;
		}
		function setTag($tag)
		{
			$this->tag=$tag;
		}
		function getTag(){
			return $this->tag;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }

       
        public function layDuLieu(){
        	$c = ClassConnect::Connect();
        	$sql='select * from quocgia where sttquocgia = 1 ORDER BY ten_vn ASC';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassQuocGia;
	        		$tk->setIDQuocGia($row->idquocgia);
					$tk->setTenQuocGia($row->tenquocgia);
					$tk->setSTTQuocGia($row->sttquocgia);
					$tk->setTenVN($row->ten_vn);
					$tk->setTag($row->tag);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
        public function layDuLieu_admin(){
        	$c = ClassConnect::Connect();
        	$sql='select * from quocgia';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassQuocGia;
	        		$tk->setIDQuocGia($row->idquocgia);
					$tk->setTenQuocGia($row->tenquocgia);
					$tk->setSTTQuocGia($row->sttquocgia);
					$tk->setTenVN($row->ten_vn);
					$tk->setTag($row->tag);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
        function themQuocGia($tenquocgia, $sttquocgia){
        	if (ClassQuocGia::ktTonTaiTenQuocGia($tenquocgia)!= 1) {        		    			
	        	$c = ClassConnect::Connect();
				$query='INSERT INTO `quocgia`(`tenquocgia`, `sttquocgia`) VALUES ("'.$tenquocgia.'","'.$sttquocgia.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				
        	}else{
        		return ' -Quốc gia này đã tồn tại </br>';
        	}	         	
	    }
        public function TimKiemQuocGiaTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassQuocGia::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from quocgia where ('.$wheresql.') ORDER BY tenquocgia';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassQuocGia;
		        		$tk->setIDQuocGia($row->idquocgia);
						$tk->setTenQuocGia($row->tenquocgia);
						$tk->setSTTQuocGia($row->sttquocgia);
						$tk->setTenVN($row->ten_vn);
						$tk->setTag($row->tag);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi SQL ';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }
        public function ktTonTaiTenQuocGia($tenquocgia){
        	if ($tenquocgia!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from quocgia where tenquocgia ="'.$tenquocgia.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
        public function PhanTichKeywork($keywork){
        	if ($keywork!='') {
        		$arkey = explode(',', trim($keywork));
        		$i=1;
        		foreach ($arkey as $key) {
        			if ($key!=' ') {
	        			if ($i<=1) {
	        				$wheresql = 'idquocgia like "%'.trim($key).'%" or tenquocgia like "%'.trim($key).'%" or sttquocgia like "%'.trim($key).'%"';
	        			}else{
	        				$wheresql .= 'idquocgia like "%'.trim($key).'%" or tenquocgia like "%'.trim($key).'%" or sttquocgia like "%'.trim($key).'%"';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
	    function xoaQuocGia($idquocgia){
        	if (ClassQuocGia::ktQuocGia($idquocgia)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `quocgia` WHERE `idquocgia`='.$idquocgia;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Quốc Gia không tồn tại </br>';
        	}	         	
	    }
	    public function ktQuocGia($id){
	    	$c1 = ClassConnect::Connect();
	        $query='select idquocgia from quocgia where idquocgia ="'.$id.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	}
 ?>

