<?php 

	class ClassChatLuongVideo
	{

		public $idchatluong,$tenchatluong,$sttchatluong;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDChatLuong($idchatluong)
		{
			$this->idchatluong=$idchatluong;
		}
		function getIDChatLuong(){
			return $this->idchatluong;
		}
		function setTenChatLuong($tenchatluong)
		{
			$this->tenchatluong=$tenchatluong;
		}
		function getTenChatLuong(){
			return $this->tenchatluong;
		}
		function setSTTChatLuong($sttchatluong)
		{
			$this->sttchatluong=$sttchatluong;
		}
		function getSTTChatLuong(){
			return $this->sttchatluong;
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
        	$sql='select * from chatluongvideo';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassChatLuongVideo;
	        		$tk->setIDChatLuong($row->idchatluong);
					$tk->setTenChatLuong($row->tenchatluong);
					$tk->setSTTChatLuong($row->sttchatluong);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }        	
        }
	}
 ?>

