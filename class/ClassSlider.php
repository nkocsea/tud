<?php 

	class ClassSlider
	{

		public $idslider, $idvideo, $linkposter, $statusslider, $date_up,$giophat,$date_down;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDSlider($idslider)
		{
			$this->idslider=$idslider;
		}
		function getIDSlider(){
			return $this->idslider;
		}
		function setIDVideo($idvideo)
		{
			$this->idvideo=$idvideo;
		}
		function getIDVideo(){
			return $this->idvideo;
		}
		function setLinkPoster($linkposter)
		{
			$this->linkposter=$linkposter;
		}
		function getLinkPoster(){
			return $this->linkposter;
		}
		function setStatusSlider($statusslider)
		{
			$this->statusslider=$statusslider;
		}
		function getStatusSlider(){
			return $this->statusslider;
		}
		function setDateUp($date_up)
		{
			$this->date_up=$date_up;
		}
		function getDateUp(){
			return $this->date_up;
		}
		function setGioPhat($giophat)
		{
			$this->giophat=$giophat;
		}
		function getGioPhat(){
			return $this->giophat;
		}
		function setDateDown($date_down)
		{
			$this->date_down=$date_down;
		}
		function getDateDown(){
			return $this->date_down;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from slider';
        	ClassSlider::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemSoSliderDisable(){
        	$sql='select * from slider where statusslider = 0';
        	ClassSlider::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
       
       	public function DemSoSliderDangPhat(){
        	$sql='SELECT * FROM `slider` where now() >= date_up and now() < date_down and statusslider = 1';
        	ClassSlider::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemSoSliderHetHieuLuc(){
        	$sql='SELECT * FROM `slider` where  now() > date_down and statusslider = 1';
        	ClassSlider::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function layDuLieu(){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='SELECT * FROM `slider` WHERE 1 ORDER BY date_up DESC';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassSlider;	        			
						$tk->setIDSlider($row->idslider);
						$tk->setIDVideo($row->idvideo);
						$tk->setLinkPoster($row->linkposter);
						$tk->setStatusSlider($row->statusslider);
						$tk->setDateUp($row->date_up);
						$tk->setGioPhat($row->giophat);
						$tk->setDateDown($row->date_down);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 'Lỗi SQL ';
	        	}        	
        }
        public function laySliderOn(){
        	$c = ClassConnect::Connect();
        	$sql='select * from slider where statusslider ="1"';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassSlider;	        			
					$tk->setIDSlider($row->idslider);
					$tk->setIDVideo($row->idvideo);
					$tk->setLinkPoster($row->linkposter);
					$tk->setStatusSlider($row->statusslider);
					$tk->setDateUp($row->date_up);
					$tk->setGioPhat($row->giophat);
					$tk->setDateDown($row->date_down);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 'Lỗi SQL ';
	        }
        }
        public function laySliderTheoID($idslider){
        	if (ClassSlider::ktSlider2($idslider)==1) {
        		$c = ClassConnect::Connect();
	        	$sql='select * from slider where idslider = '.$idslider;
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {
		        		$tk = new ClassSlider;	        			
						$tk->setIDSlider($row->idslider);
						$tk->setIDVideo($row->idvideo);
						$tk->setLinkPoster($row->linkposter);
						$tk->setStatusSlider($row->statusslider);
						$tk->setDateUp($row->date_up);
						$tk->setGioPhat($row->giophat);
						$tk->setDateDown($row->date_down);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 'Lỗi SQL ';
		        }
        	}else{
        		echo ' - Banner không tồn tại.';
        	}	        	
        }
        function themSlider($idvideo, $linkposter, $statusslider, $date_up, $giophat, $date_down){
        	if (ClassSlider::ktSlider($idvideo)!= 1) {
        		$c = ClassConnect::Connect();
			    $query='INSERT INTO `slider`(`idvideo`, `linkposter`, `statusslider`, `date_up`, `giophat`, `date_down`) VALUES ("'.$idvideo.'","'.$linkposter.'","'.$statusslider.'","'.$date_up.'","'.$giophat.'","'.$date_down.'")';
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Thêm không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Phim này đã có Poster </br>';
        	}
	         	
	    }
	    function suaSlider($idslider,$idvideo, $linkposter, $statusslider, $date_up, $giophat, $date_down){
        	if (ClassSlider::ktSlider2($idslider)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `slider` SET `idvideo`="'.$idvideo.'",`linkposter`="'.$linkposter.'",`statusslider`="'.$statusslider.'",`date_up`="'.$date_up.'",`giophat`="'.$giophat.'",`date_down`="'.$date_down.'" WHERE `idslider`='.$idslider;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - cập nhật không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Banner không tồn tại</br>';
        	}
	         	
	    }
	     function xoaSlider($idslider){
        	if (ClassSlider::ktSlider2($idslider)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `slider` WHERE `idslider`='.$idslider;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Banner không tồn tại</br>';
        	}
	         	
	    }
	    public function ktSlider($idvideo){
	    	$c1 = ClassConnect::Connect();
	        $query='select idslider from slider where idvideo ="'.$idvideo.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function ktSlider2($idslider){
	    	$c1 = ClassConnect::Connect();
	        $query='select idslider from slider where idslider ="'.$idslider.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	    public function ktTrungSlider($idvideo,$linkposter){
	    	$c1 = ClassConnect::Connect();
	        $query='select idslider from slider where idvideo ="'.$idvideo.'" and linkposter ="'.$linkposter.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);
	        if($num>0){return 1;}
	        else{return 0;}
	    }
	}
 ?>

