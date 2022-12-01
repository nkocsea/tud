<?php 

	class ClassNgonNguVideo
	{

		public $idngonngu, $ngonngu, $status;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDNgonNgu($idngonngu)
		{
			$this->idngonngu=$idngonngu;
		}
		function getIDNgonNgu(){
			return $this->idngonngu;
		}
		function setNgonNgu($ngonngu)
		{
			$this->ngonngu=$ngonngu;
		}
		function getNgonNgu(){
			return $this->ngonngu;
		}
		function setStatus($status)
		{
			$this->status=$status;
		}
		function getStatus(){
			return $this->status;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from ngonngu';
        	ClassNgonNguVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemNgonNguDisable(){
        	$sql='select * from ngonngu where status = 0';
        	ClassNgonNguVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
       
        public function layDuLieu(){
        	$c = ClassConnect::Connect();
        	$sql='select * from ngonngu where status =1';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassNgonNguVideo;
	        		$tk->setIDNgonNgu($row->idngonngu);
					$tk->setNgonNgu($row->ngonngu);
					$tk->setStatus($row->status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else {
	        	return 2;
	        }        	
        }
        public function layDuLieu_admin(){
        	$c = ClassConnect::Connect();
        	$sql='select * from ngonngu';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassNgonNguVideo;
	        		$tk->setIDNgonNgu($row->idngonngu);
					$tk->setNgonNgu($row->ngonngu);
					$tk->setStatus($row->status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else {
	        	return 2;
	        }        	
        }
        function themNgonNguVideo($ngonngu, $stt){
        	if (ClassNgonNguVideo::ktTonTaiNgonNguVideo($ngonngu)!= 1) {        		    			
	        	$c = ClassConnect::Connect();
				$query='INSERT INTO `ngonngu`(`ngonngu`, `status`) VALUES ("'.$ngonngu.'","'.$stt.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				
        	}else{
        		return ' -Ngon ngu này đã tồn tại </br>';
        	}	         	
	    }
        public function TimKiemNgonNguVideoTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassNgonNguVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from ngonngu where ('.$wheresql.') ORDER BY ngonngu';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassNgonNguVideo;
		        		$tk->setIDNgonNgu($row->idngonngu);
						$tk->setNgonNgu($row->ngonngu);
						$tk->setStatus($row->status);
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
        public function ktTonTaiNgonNguVideo($ngonngu){
        	if ($loaifile!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from ngonngu where ngonngu ="'.$ngonngu.'"';
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
	        				$wheresql = 'idngonngu like "%'.trim($key).'%" or ngonngu like "%'.trim($key).'%" or status like "%'.trim($key).'%"';
	        			}else{
	        				$wheresql .= 'idngonngu like "%'.trim($key).'%" or ngonngu like "%'.trim($key).'%" or status like "%'.trim($key).'%"';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
	    function xoaNgonNguVideo($id){
        	if (ClassNgonNguVideo::ktLoaiServerVideo($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `ngonngu` WHERE `idngonngu`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Ngon ngu này không tồn tại </br>';
        	}	         	
	    }
	    public function ktNgonNguVideo($id){
	    	$c1 = ClassConnect::Connect();
	        $query='select idngonngu from ngonngu where idngonngu ="'.$id.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	}
 ?>

