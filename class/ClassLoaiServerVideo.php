<?php 

	class ClassLoaiServerVideo
	{

		public $idloai, $loai_server,$source_player,$source_player_end, $statusloai;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDLoai($idloai)
		{
			$this->idloai=$idloai;
		}
		function getIDLoai(){
			return $this->idloai;
		}
		function setLoaiServer($loai_server)
		{
			$this->loai_server=$loai_server;
		}
		function getLoaiServer(){
			return $this->loai_server;
		}
		function setSourcePlayer($source_player)
		{
			$this->source_player=$source_player;
		}
		function getSourcePlayer(){
			return $this->source_player;
		}
		function setSourcePlayerEnd($source_player_end)
		{
			$this->source_player_end=$source_player_end;
		}
		function getSourcePlayerEnd(){
			return $this->source_player_end;
		}
		function setStatusLoai($statusloai)
		{
			$this->statusloai=$statusloai;
		}
		function getStatusLoai(){
			return $this->statusloai;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from loai_server_video';
        	ClassLoaiServerVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemLoaiServerVideoDisable(){
        	$sql='select * from loai_server_video where statusloai = 0';
        	ClassLoaiServerVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
       
        public function layDuLieu(){
        	$c = ClassConnect::Connect();
        	$sql='select * from loai_server_video where statusloai =1';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassLoaiServerVideo;
	        		$tk->setIDLoai($row->idloai);
					$tk->setLoaiServer($row->loai_server);
					$tk->setSourcePlayer($row->source_player);
					$tk->setSourcePlayerEnd($row->source_player_end);
					$tk->setStatusLoai($row->statusloai);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else {
	        	return 2;
	        }        	
        }
        public function layDuLieu_admin(){
        	$c = ClassConnect::Connect();
        	$sql='select * from loai_server_video';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassLoaiServerVideo;
	        		$tk->setIDLoai($row->idloai);
					$tk->setLoaiServer($row->loai_server);
					$tk->setSourcePlayer($row->source_player);
					$tk->setSourcePlayerEnd($row->source_player_end);
					$tk->setStatusLoai($row->statusloai);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else {
	        	return 2;
	        }        	
        }
        public function laySourcePlayer($loai_server){
        	if (ClassLoaiServerVideo::ktTonTaiLoaiServerVideo($loai_server)==1) {
        		$c = ClassConnect::Connect();
	        	$sql='select `source_player` from loai_server_video where `loai_server` ="'.$loai_server.'"';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){	        		
	        		while ($row=mysqli_fetch_object($result)) {	        			
	        			$kq = $row->source_player;	        			
	        		}
	        		return $kq;
	        	}else{
	        		return ' - Lỗi SQL';
	        	} 
        	}else{
        		return 0;
        	}
        	      	
        }
        public function laySourcePlayerEnd($loai_server){
        	if (ClassLoaiServerVideo::ktTonTaiLoaiServerVideo($loai_server)==1) {
        		$c = ClassConnect::Connect();
	        	$sql='select `source_player_end` from loai_server_video where `loai_server` ="'.$loai_server.'"';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){	        		
	        		while ($row=mysqli_fetch_object($result)) {	        			
	        			$kq = $row->source_player_end;	        			
	        		}
	        		return $kq;
	        	}else{
	        		return ' - Lỗi SQL';
	        	} 
        	}else{
        		return 0;
        	}
        	      	
        }
        function themLoaiServerVideo($loai_server,$source_player,$source_player_end, $stt){
        	if (ClassLoaiServerVideo::ktTonTaiLoaiServerVideo($loai_server)!= 1) {        		    			
	        	$c = ClassConnect::Connect();
				$query='INSERT INTO `loai_server_video`(`loai_server`,`source_player`, `source_player_end`,`statusloai`) VALUES ("'.$loai_server.'","'.$source_player.'","'.$source_player_end.'","'.$stt.'")';
				    $kq = mysqli_query($c,$query);
				    if($kq){
				    	return $kq;
				    }else{
				    	return ' - Thêm không thành công, lỗi SQL </br>';
				    }
				
        	}else{
        		return ' -Loại server này đã tồn tại </br>';
        	}	         	
	    }
        public function TimKiemLoaiServerVideoTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassLoaiServerVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from loai_server_video where ('.$wheresql.') ORDER BY loai_server';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassLoaiServerVideo;
		        		$tk->setIDLoai($row->idloai);
						$tk->setLoaiServer($row->loai_server);
						$tk->setSourcePlayer($row->source_player);
						$tk->setSourcePlayerEnd($row->source_player_end);
						$tk->setStatusLoai($row->statusloai);
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
        public function ktTonTaiLoaiServerVideo($loai_server){
        	if ($loai_server!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select * from loai_server_video where loai_server ="'.$loai_server.'"';
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
	        				$wheresql = 'idloai like "%'.trim($key).'%" or loai_server like "%'.trim($key).'%" or statusloai like "%'.trim($key).'%"';
	        			}else{
	        				$wheresql .= 'idloai like "%'.trim($key).'%" or loai_server like "%'.trim($key).'%" or statusloai like "%'.trim($key).'%"';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
	    function xoaLoaiServerVideo($id){
        	if (ClassLoaiServerVideo::ktLoaiServerVideo($id)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `loai_server_video` WHERE `idloai`='.$id;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' -Loại File này không tồn tại </br>';
        	}	         	
	    }
	    public function ktLoaiServerVideo($id){
	    	$c1 = ClassConnect::Connect();
	        $query='select idloai from loai_server_video where idloai ="'.$id.'"';
	        $result=  mysqli_query($c1,$query);
	        $num=  mysqli_num_rows($result);	

	        if($num>0){return 1;}
	        else{return 0;}
	    }
	}
 ?>

