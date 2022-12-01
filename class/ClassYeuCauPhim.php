<?php 

	class ClassYeuCauPhim
	{
		public $id, $email, $tenphim, $dateup, $status;
		private $result;
		
		
		function setID($id)
		{
			$this->id=$id;
		}
		function getID(){
			return $this->id;
		}
		function setEmail($email)
		{
			$this->email=$email;
		}
		function getEmail(){
			return $this->email;
		}
		function setTenPhim($tenphim)
		{
			$this->tenphim=$tenphim;
		}
		function getTenPhim(){
			return $this->tenphim;
		}
		function setDateup($dateup)
		{
			$this->dateup=$dateup;
		}
		function getDateup(){
			return $this->dateup;
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
        	$sql='select * from `yeucauphim`';
        	ClassYeuCauPhim::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        /// status  
        ///= 0 : vo hieu hoa
        ///= 1 : yêu cầu mới
        ///= 2 : Đã gửi mail tiếp nhận thông tin 
        ///= 3 : Đã update phim được yêu cầu, chưa trả lời
        ///= 4 : Đã mail báo có phim
        ///=5 : Email khong đúng

        public function DemSoYeuCauDisable(){
        	$sql='select * from `yeucauphim` where status = 0';
        	ClassYeuCauPhim::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }     
        public function layDuLieu(){
        	$sql='select * from `yeucauphim`';
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassYeuCauPhim;
	        		$tk->setID($row->id);
					$tk->setEmail($row->email);
					$tk->setTenPhim($row->tenphim);
					$tk->setDateup($row->dateup);
					$tk->setStatus($row->status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }
        public function layYeuCauEnable(){
        	$sql='select * from `yeucauphim` where status != 0 ORDER BY dateup DESC';
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassYeuCauPhim;
	        		$tk->setID($row->id);
					$tk->setEmail($row->email);
					$tk->setTenPhim($row->tenphim);
					$tk->setDateup($row->dateup);
					$tk->setStatus($row->status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }
        public function layYeuCauTheoID($id){
        	if (ClassYeuCauPhim::ktTonTaiYeuCau($id)==1) {        	
	        	$sql='select * from `yeucauphim` where id ='.$id;
	        	$c = ClassConnect::Connect();
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {
		        		$tk = new ClassYeuCauPhim;
		        		$tk->setID($row->id);
						$tk->setEmail($row->email);
						$tk->setTenPhim($row->tenphim);
						$tk->setDateup($row->dateup);
						$tk->setStatus($row->status);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 'Lỗi SQL';
		        }
		    }else{
		    	return 'Yêu cầu này không tồn tại';
		    }        	
        }
        public function ktYeuCauEmailTenPhim($email,$tenphim){
        	if ($tenphim!=''&&$email!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from yeucauphim where tenphim ="'.$tenphim.'" and email = "'.$email.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function ktTonTaiYeuCau($id){
        	if ($id!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select `id` from yeucauphim where `id`= "'.$id.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    function themYeuCau($email, $tenphim, $status){
        	if (ClassYeuCauPhim::ktYeuCauEmailTenPhim($email,$tenphim)!= 1) {        		
	        	$c = ClassConnect::Connect();
				$query='INSERT INTO `yeucauphim`(`email`, `tenphim`,`status`) VALUES ("'.$email.'","'.$tenphim.'","'.$status.'")';
				$kq = mysqli_query($c,$query);
				if($kq){
				    return $kq;
				}else{
				    return ' - Thêm không thành công, lỗi SQL </br>';
				}				
        	}else{
        		return ' - Yêu cầu đã tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function suaYeuCau($id, $email, $tenphim, $dateup, $status){
        	if (ClassYeuCauPhim::ktTonTaiUser($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `yeucauphim` SET  `email`="'.$email.'",`tenphim`="'.$tenphim.'",`dateup`="'.$dateup.'",`status`="'.$status.'" WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Chỉnh sửa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - Yeu cau này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function updateStatus($id,$status){
        	if (ClassYeuCauPhim::ktTonTaiUser($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `yeucauphim` SET  `status`="'.$status.'" WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Chỉnh sửa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - Yeu cau này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function xoaYeuCau($id){
        	if (ClassYeuCauPhim::ktTonTaiYeuCau($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `yeucauphim` WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa yeu cau không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - Yeu cau này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	}
 ?>