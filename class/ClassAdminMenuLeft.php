<?php 

	class ClassAdminMenuLeft
	{

		public $id_menuleft, $tag_menuleft, $ten_menuleft, $status_menuleft;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDMenuLeft($id_menuleft)
		{
			$this->id_menuleft=$id_menuleft;
		}
		function getIDMenuLeft(){
			return $this->id_menuleft;
		}
		function setTagMenuLeft($tag_menuleft)
		{
			$this->tag_menuleft=$tag_menuleft;
		}
		function getTagMenuLeft(){
			return $this->tag_menuleft;
		}
		function setTenMenuLeft($ten_menuleft)
		{
			$this->ten_menuleft=$ten_menuleft;
		}
		function getTenMenuLeft(){
			return $this->ten_menuleft;
		}
		function setStatusMenuLeft($status_menuleft)
		{
			$this->status_menuleft=$status_menuleft;
		}
		function getStatusMenuLeft(){
			return $this->status_menuleft;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from admin_menuleft';
        	ClassAdminMenuLeft::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }

       
        public function layDuLieu(){
        		$c = ClassConnect::Connect();
        		$sql='select * from admin_menuleft where status_menuleft =1';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassAdminMenuLeft;
	        			
						$tk->setIDMenuLeft($row->id_menuleft);
						$tk->setTenMenuLeft($row->ten_menuleft);
						$tk->setTagMenuLeft($row->tag_menuleft);
						$tk->setStatusMenuLeft($row->status_menuleft);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layDuLieu_Admin(){
        		$c = ClassConnect::Connect();
        		$sql='select * from admin_menuleft';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassAdminMenuLeft;
	        			
						$tk->setIDMenuLeft($row->id_menuleft);
						$tk->setTenMenuLeft($row->ten_menuleft);
						$tk->setTagMenuLeft($row->tag_menuleft);
						$tk->setStatusMenuLeft($row->status_menuleft);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function layMenuEnable(){
        		$c = ClassConnect::Connect();
        		$sql='select * from admin_menuleft where status_menuleft = 1';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassAdminMenuLeft;	        			
						$tk->setIDMenuLeft($row->id_menuleft);
						$tk->setTenMenuLeft($row->ten_menuleft);
						$tk->setTagMenuLeft($row->tag_menuleft);
						$tk->setStatusMenuLeft($row->status_menuleft);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 'Lỗi SQL ';
	        	}        	
        }
        public function ktAdminMenuLeft($id_menuleft){
	    	$c1 = ClassConnect::Connect();
	        $query='select id_menuleft from admin_menuleft where id_menuleft ="'.$id_menuleft.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    function xoaAdminMenuLeft($id){
        	if (ClassAdminMenuLeft::ktAdminMenuLeft($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `admin_menuleft` WHERE `id_menuleft`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Chức năng này không tồn tại </br>';
        	}	         	
	    }
	    function themAdminMenuLeft($ten,$tag,$stt){
        	if (ClassAdminMenuLeft::ktTonTaiTheoTen($ten)!= 1) {        		    			
	        	$c = ClassConnect::Connect();
				$query='INSERT INTO `admin_menuleft`(`ten_menuleft`, `tag_menuleft`, `status_menuleft`) VALUES ("'.$ten.'","'.$tag.'","'.$stt.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				
        	}else{
        		return ' -Chức năng này đã tồn tại </br>';
        	}	         	
	    }
	    public function ktTonTaiTheoTen($ten){
        	if ($ten!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from admin_menuleft where ten_menuleft ="'.$ten.'"'; 
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 2;
	        }
	    }
	    public function ktTonTaiTheoTag($tag){
        	if ($tag!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from admin_menuleft where tag_menuleft ="'.$tag.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){return 1;}
		        else{return "0";}
	        }else{
	        	return 2;
	        }
	    }
        public function TimKiemAdminMenuLeftVideoTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassAdminMenuLeft::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from admin_menuleft where ('.$wheresql.') ORDER BY ten_menuleft';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassAdminMenuLeft;
		        		$tk->setIDMenuLeft($row->id_menuleft);
						$tk->setTenMenuLeft($row->ten_menuleft);
						$tk->setTagMenuLeft($row->tag_menuleft);
						$tk->setStatusMenuLeft($row->status_menuleft);
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
        public function PhanTichKeywork($keywork){
        	if ($keywork!='') {
        		$arkey = explode(',', trim($keywork));
        		$i=1;
        		foreach ($arkey as $key) {
        			if ($key!=' ') {
	        			if ($i<=1) {
	        				$wheresql = 'id_menuleft like "%'.trim($key).'%" or ten_menuleft like "%'.trim($key).'%" or tag_menuleft like "%'.trim($key).'%" or status_menuleft like "%'.trim($key).'%"';
	        			}else{
	        				$wheresql .= 'id_menuleft like "%'.trim($key).'%" or ten_menuleft like "%'.trim($key).'%" or tag_menuleft like "%'.trim($key).'%" or status_menuleft like "%'.trim($key).'%"';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
	}
 ?>

