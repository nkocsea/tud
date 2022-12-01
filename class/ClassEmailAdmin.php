<?php 

	class ClassEmailAdmin
	{
		public $id, $email, $pass, $smtp, $status;
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
		function setPass($pass)
		{
			$this->pass=$pass;
		}
		function getPass(){
			return $this->pass;
		}
		function setSMTP($smtp)
		{
			$this->smtp=$smtp;
		}
		function getSMTP(){
			return $this->smtp;
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
        	$sql='select * from `email_admin`';
        	ClassEmailAdmin::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }

        public function layDuLieu(){
        	$sql='select * from `email_admin`';
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassEmailAdmin;
	        		$tk->setID($row->$id);
					$tk->setEmail($row->$email);
					$tk->setPass($row->$pass);
					$tk->setSMTP($row->$smtp);
					$tk->setStatus($row->$status);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }
        public function layEmailID($id){
        	if (ClassEmailAdmin::ktTonTaiEmail($id)==1) {        	
	        	$sql='select * from `email_admin` where id ='.$id;
	        	$c = ClassConnect::Connect();
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {
		        		$tk = new ClassEmailAdmin;
		        		$tk->setID($row->$id);
						$tk->setEmail($row->$email);
						$tk->setPass($row->$pass);
						$tk->setSMTP($row->$smtp);
						$tk->setStatus($row->$status);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 'Lỗi SQL';
		        }
		    }else{
		    	return 'Email này không tồn tại';
		    }        	
        }
        public function layEmail(){        	       	
	        $sql='select * from `email_admin` where status =1';
	        $c = ClassConnect::Connect();
	        $result=mysqli_query($c,$sql);
	        if(mysqli_num_rows($result)>0){
		        $arr=array();
		        while ($row=mysqli_fetch_object($result)) {
		        	$tk = new ClassEmailAdmin;
		        	$tk->setID($row->$id);
					$tk->setEmail($row->$email);
					$tk->setPass($row->$pass);
					$tk->setSMTP($row->$smtp);
					$tk->setStatus($row->$status);
		        	$arr[]=$tk;
		        }
		        return $arr;
		    }else{
		       return 'Lỗi SQL';
		    }		           	
        }
	    public function ktTonTaiEmail($id){
        	if ($id!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select `id` from email_admin where `id`= "'.$id.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function ktTonTaiEmailTheoEmail($email){
        	if ($id!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select `id` from email_admin where `email`= "'.$email.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    function themEmail($email, $pass, $smtp, $status){
        	if (ClassEmailAdmin::ktTonTaiEmailTheoEmail($email)!= 1) {        		
	        	$c = ClassConnect::Connect();
				$query='INSERT INTO `email_admin`(`email`, `pass`, `smtp`, `status`) VALUES ("'.$email.'","'.$pass.'","'.$smtp.'","'.$status.'")';
				$kq = mysqli_query($c,$query);
				if($kq){
				    return $kq;
				}else{
				    return ' - Thêm không thành công, lỗi SQL </br>';
				}				
        	}else{
        		return ' - Email đã tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function suaEmail($id, $email, $pass, $smtp, $status){
        	if (ClassEmailAdmin::ktTonTaiEmail($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `email_admin` SET  `email`="'.$email.'",`pass`="'.$pass.'",`smtp`="'.$smtp.'",`status`="'.$status.'" WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Chỉnh sửa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - Email này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function updateStatus($id,$status){
        	if (ClassEmailAdmin::ktTonTaiUser($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `email_admin` SET  `status`="'.$status.'" WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Update status không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - Email này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function xoaEmail($id){
        	if (ClassEmailAdmin::ktTonTaiEmail($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `email_admin` WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa email không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - Email này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	}
 ?>