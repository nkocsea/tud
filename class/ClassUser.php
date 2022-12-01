<?php 

	class ClassUser
	{

		public $id, $email, $pass, $name, $role, $status, $date;
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
		function setPassword($pass)
		{
			$this->pass=$pass;
		}
		function getPassword(){
			return $this->pass;
		}
		function setName($name)
		{
			$this->name=$name;
		}
		function getName(){
			return $this->name;
		}
		function setRole($role)
		{
			$this->role=$role;
		}
		function getRole(){
			return $this->role;
		}
		function setStatus($status)
		{
			$this->status=$status;
		}
		function getStatus(){
			return $this->status;
		}
		function setDate($date)
		{
			$this->date=$date;
		}
		function getDate(){
			return $this->date;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from `users`';
        	ClassUser::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }  
        public function DemSoUserDisable(){
        	$sql='select * from `users` where status = 1';
        	ClassUser::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }     
        public function layDuLieu(){
        	$sql='select * from `users`';
        	$c = ClassConnect::Connect();
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassUser;
	        		$tk->setID($row->id);
					$tk->setEmail($row->email);
					$tk->setPassword($row->pass);
					$tk->setName($row->name);
					$tk->setRole($row->role);
					$tk->setStatus($row->status);
					$tk->setDate($row->date);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL';
	        }        	
        }
        public function layUserTheoID($id){
        	if (ClassUser::ktTonTaiUser($id)==1) {        	
	        	$sql='select * from `users` where id ='.$id;
	        	$c = ClassConnect::Connect();
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {
		        		$tk = new ClassUser;
		        		$tk->setID($row->id);
						$tk->setEmail($row->email);
						$tk->setPassword($row->pass);
						$tk->setName($row->name);
						$tk->setRole($row->role);
						$tk->setStatus($row->status);
						$tk->setDate($row->date);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 'Lỗi SQL';
		        }
		    }else{
		    	return 'User này không tồn tại';
		    }        	
        }
       
	    public function ktTonTaiUser($id){
        	if ($id!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select `id` from users where `id`= "'.$id.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    
	    public function ktDangNhap($user,$pass){
        	if ($user!=''&&$pass!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from users where `email`= "'.$user.'" and `pass` = "'.$pass.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {
		        		$tk = new ClassUser;
		        		$tk->setID($row->id);
						$tk->setEmail($row->email);
						$tk->setPassword($row->pass);
						$tk->setName($row->name);
						$tk->setRole($row->role);
						$tk->setStatus($row->status);
						$tk->setDate($row->date);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function ktTonTaiUserTheoEmail($email){
        	if ($email!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select `id` from `users` where `email`= "'.$email.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    function themUser($email, $pass, $name, $role, $status, $date){
        	if (ClassUser::ktTonTaiUserTheoUser($user_kulladi)!= 1) {
        		if (ClassUser::ktTonTaiUserTheoEmail($email)!= 1) {
	        		$c = ClassConnect::Connect();
				    $query='INSERT INTO `users`(`email`, `pass`, `name`, `role`, `status`, `date`) VALUES ("'.$email.'","'.$pass.'","'.$name.'","","'.$role.'","'.$status.'","'.$date.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				}else{
					return ' - Email đã tồn tại trong hệ thống</br>';
				}
        	}else{
        		return ' - User đã tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function suaUser($id, $email, $pass, $name, $role, $status, $date){
        	if (ClassUser::ktTonTaiUser($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `users` SET  `email`="'.$email.'",`pass`="'.$pass.'",`name`="'.$name.'",`role`="'.$role.'",`status`="'.$status.'" WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Chỉnh sửa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - User này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function doiPassUser($id, $pass){
        	if (ClassUser::ktTonTaiUser($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `users` SET  `pass`="'.$pass.'" WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Chỉnh sửa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - User này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function xoaUser($id){
        	if (ClassUser::ktTonTaiUser($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `users` WHERE `id`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa User không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - User này không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    public function TimKiemUserTheoKeyword($keyword){ 
	    	if ($keyword != '') {	    		
	        	$sql='SELECT * FROM `users` WHERE  `id` like "%'.$keyword.'%"  or `email` like "%'.$keyword.'%" or `name` like "%'.$keyword.'%" or `date` like "%'.$keyword.'%" or `status` like "%'.$keyword.'%"';
	        	$c = ClassConnect::Connect();
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {
		        		$tk = new ClassUser;
		        		$tk->setID($row->id);
						$tk->setEmail($row->email);
						$tk->setPassword($row->pass);
						$tk->setName($row->name);
						$tk->setRole($row->role);
						$tk->setStatus($row->status);
						$tk->setDate($row->date);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 'Lỗi SQL';
		        }
		    }else{
		    	return 'Từ khóa trống.';
		    }        	
        }
	}
 ?>
 <?php

?>