<?php 

	class ClassHashtag
	{

		public $idhashtag, $tenhashtag, $statushashtag;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDHashtag($idhashtag)
		{
			$this->idhashtag=$idhashtag;
		}
		function getIDHashtag(){
			return $this->idhashtag;
		}
		function setTenHashtag($tenhashtag)
		{
			$this->tenhashtag=$tenhashtag;
		}
		function getTenHashtag(){
			return $this->tenhashtag;
		}
		function setStatusHashtag($statushashtag)
		{
			$this->statushashtag=$statushashtag;
		}
		function getStatusHashtag(){
			return $this->statushashtag;
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
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from hashtag';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassHashtag;
	        			$tk->setIDHashtag($row->idhashtag);
						$tk->setTenHashtag($row->tenhashtag);
						$tk->setStatusHashtag($row->statushashtag);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return 2;
	        	}        	
        }
	}
 ?>

