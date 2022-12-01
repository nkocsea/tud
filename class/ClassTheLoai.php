<?php 

	class ClassTheLoai
	{

		public $idtheloai, $tentheloai,$tagtheloai, $stttheloai,$nhomtheloai;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDTheLoai($idtheloai)
		{
			$this->idtheloai=$idtheloai;
		}
		function getIDTheLoai(){
			return $this->idtheloai;
		}
		
		function setTenTheLoai($tentheloai){
			$this->tentheloai=$tentheloai;
		}
		function getTenTheLoai(){
			return $this->tentheloai;
		}
		function setTagTheLoai($tagtheloai){
			$this->tagtheloai=$tagtheloai;
		}
		function getTagTheLoai(){
			return $this->tagtheloai;
		}
		function setSTTTheLoai($stttheloai){
			$this->stttheloai = $stttheloai;
		}
		function getSTTTheLoai(){
			return $this->stttheloai;
		}
		function setNhomTheLoai($nhomtheloai){
			$this->nhomtheloai = $nhomtheloai;
		}
		function getNhomTheLoai(){
			return $this->nhomtheloai;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from theloai';
        	ClassTheLoai::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemSoTheLoaiDisable(){
        	$sql='select * from theloai where statustheloai = 0';
        	ClassTheLoai::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
       
        public function layDuLieu(){
        	$c = ClassConnect::Connect();
        	$sql='select * from theloai ORDER BY tentheloai ASC';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassTheLoai;
	        		$tk->setIDTheLoai($row->idtheloai);
	        		$tk->setTenTheLoai($row->tentheloai);
	        		$tk->setTagTheLoai($row->tagtheloai);
	        		$tk->setSTTTheLoai($row->statustheloai);
	        		$tk->setNhomTheLoai($row->nhomtheloai);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
        public function layTheLoaiCoTron(){
        	$c = ClassConnect::Connect();
        	$sql='select * from theloai ORDER BY RAND()';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassTheLoai;
	        		$tk->setIDTheLoai($row->idtheloai);
	        		$tk->setTenTheLoai($row->tentheloai);
	        		$tk->setTagTheLoai($row->tagtheloai);
	        		$tk->setSTTTheLoai($row->statustheloai);
	        		$tk->setNhomTheLoai($row->nhomtheloai);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
        public function layTheLoaiTheoNhom($nhom){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from theloai where '.$nhom;
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassTheLoai;
	        			$tk->setIDTheLoai($row->idtheloai);
	        			$tk->setTenTheLoai($row->tentheloai);
	        			$tk->setTagTheLoai($row->tagtheloai);
	        			$tk->setSTTTheLoai($row->statustheloai);
	        			$tk->setNhomTheLoai($row->nhomtheloai);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        function layTheLoaiTheoKey($key){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='SELECT * FROM `theloai` where tentheloai like "%'.$key.'%" or tagtheloai like "%'.$key.'%" or statustheloai like "%'.$key.'%" or nhomtheloai like "%'.$key.'%"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassTheLoai;
	        			$tk->setIDTheLoai($row->idtheloai);
	        			$tk->setTenTheLoai($row->tentheloai);
	        			$tk->setTagTheLoai($row->tagtheloai);
	        			$tk->setSTTTheLoai($row->statustheloai);
	        			$tk->setNhomTheLoai($row->nhomtheloai);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layTheLoaiTheoTag($tag){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from theloai where tagtheloai ="'.$tag.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassTheLoai;
	        			$tk->setIDTheLoai($row->idtheloai);
	        			$tk->setTenTheLoai($row->tentheloai);
	        			$tk->setTagTheLoai($row->tagtheloai);
	        			$tk->setSTTTheLoai($row->statustheloai);
	        			$tk->setNhomTheLoai($row->nhomtheloai);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layTheLoaiTheoID($idtheloai){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from theloai where idtheloai ="'.$idtheloai.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassTheLoai;
	        			$tk->setIDTheLoai($row->idtheloai);
	        			$tk->setTenTheLoai($row->tentheloai);
	        			$tk->setTagTheLoai($row->tagtheloai);
	        			$tk->setSTTTheLoai($row->statustheloai);
	        			$tk->setNhomTheLoai($row->nhomtheloai);
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
        		$sql='select distinct nhomtheloai from theloai';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassTheLoai;
	        			$tk->setNhomTheLoai($row->nhomtheloai);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        function themTheLoai($tentheloai, $tagtheloai, $statustheloai, $nhomtheloai){
        	if (ClassTheLoai::ktTheLoaiTheoTenTheLoai($tentheloai)!= 1) {
        		if (ClassTheLoai::ktTheLoaiTheoTag($tagtheloai)!=1) {        			
	        		$c = ClassConnect::Connect();
				    $query='INSERT INTO `theloai`(`tentheloai`, `tagtheloai`, `statustheloai`, `nhomtheloai`) VALUES ("'.$tentheloai.'","'.$tagtheloai.'","'.$statustheloai.'","'.$nhomtheloai.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				}else{
					return ' - Tag thể loại đã tồn tại';
				}
        	}else{
        		return ' -Thể loại đã tồn tại </br>';
        	}	         	
	    }
	    function suaTheLoai($idtheloai,$tentheloai, $tagtheloai, $statustheloai, $nhomtheloai){
        	if (ClassTheLoai::ktTheLoai($idtheloai)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `theloai` SET `tentheloai`="'.$tentheloai.'",`tagtheloai`="'.$tagtheloai.'",`statustheloai`="'.$statustheloai.'",`nhomtheloai`="'.$nhomtheloai.'" WHERE `idtheloai`='.$idtheloai;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Sữa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Thể loại không tồn tại </br>';
        	}	         	
	    }
	    function xoaTheLoai($idtheloai){
        	if (ClassTheLoai::ktTheLoai($idtheloai)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `theloai` WHERE `idtheloai`='.$idtheloai;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Thể loại không tồn tại </br>';
        	}	         	
	    }
	    public function ktTheLoai($idtheloai){
	    	$c1 = ClassConnect::Connect();
	        $query='select idtheloai from theloai where idtheloai ="'.$idtheloai.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function ktTheLoaiTheoTenTheLoai($tentheloai){
	    	$c1 = ClassConnect::Connect();
	        $query='select idtheloai from theloai where tentheloai ="'.$tentheloai.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function ktTheLoaiTheoTag($tag){
	    	$c1 = ClassConnect::Connect();
	        $query='select idtheloai from theloai where tagtheloai ="'.$tag.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	}
 ?>

