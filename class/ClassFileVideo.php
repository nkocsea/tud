<?php 

	class ClassFileVideo
	{

		public $idfilevideo, $idvideo, $linkvideo,$loaifilevideo, $ngonnguvideo,$tap,$totalloaifile,$totaltap;
		private $result;
		
		// $c = ClassConnect::Connect();
		function setIDFileVideo($idfilevideo)
		{
			$this->idfilevideo=$idfilevideo;
		}
		function getIDFileVideo(){
			return $this->idfilevideo;
		}
		function setIDVideo($idvideo)
		{
			$this->idvideo=$idvideo;
		}
		function getIDVideo(){
			return $this->idvideo;
		}
		function setLinkVideo($linkvideo)
		{
			$this->linkvideo=$linkvideo;
		}
		function getLinkVideo(){
			return $this->linkvideo;
		}
		function setLoaiFileVideo($loaifilevideo)
		{
			$this->loaifilevideo=$loaifilevideo;
		}
		function getLoaiFileVideo(){
			return $this->loaifilevideo;
		}
		function setTotalLoaiFile($totalloaifile)
		{
			$this->totalloaifile=$totalloaifile;
		}
		function getTotalLoaiFile(){
			return $this->totalloaifile;
		}
		function setNgonNguVideo($ngonnguvideo)
		{
			$this->ngonnguvideo=$ngonnguvideo;
		}
		function getNgonNguVideo(){
			return $this->ngonnguvideo;
		}
		function setTap($tap)
		{
			$this->tap=$tap;
		}
		function getTap(){
			return $this->tap;
		}
		function setTotalTap($totaltap)
		{
			$this->totaltap=$totaltap;
		}
		function getTotalTap(){
			return $this->totaltap;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from filevideo';
        	ClassFileVideo::TruyVan($sql);
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
        		$sql='select * from filevideo';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
						$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}        	
        }
        public function getLinkFileVideo($idvideo,$tp){
        	if(ClassFileVideo::ktFileVideo($idvideo,$tp)==1){
        		$c = ClassConnect::Connect();
        		if ($tp!='') {
        			$sql='select * from filevideo where idvideo = "'.$idvideo.'" and tap="'.$tp.'"';
        		}else{
        			$sql='select * from filevideo where idvideo = "'.$idvideo.'"';
        		}
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Link không tồn tại';
	        }
        }
        public function getLinkFileVideoTheoIDPhimVaServerVaTapVaNgonNgu($idvideo,$server,$ngonngu,$tp){
        	if(ClassFileVideo::ktFileVideoVoiBaThongSo($idvideo,$server,$tp)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select * from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo="'.$server.'" and ngonnguvideo="'.$ngonngu.'" and tap = "'.$tp.'"';     		
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Link không tồn tại';
	        }
        }
        public function getIDLinkFileVideo($idvideo,$tp){
        	if(ClassFileVideo::ktFileVideo($idvideo,$tp)==1){
        		$c = ClassConnect::Connect();
        		if ($tp!='') {
        			$sql='select distinct idfilevideo from filevideo where idvideo = "'.$idvideo.'" and tap="'.$tp.'"';
        		}else{
        			$sql='select distinct idfilevideo from filevideo where idvideo = "'.$idvideo.'"';
        		}
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			$tk = new ClassFileVideo;
	         			$tk->setIDFileVideo($row->idfilevideo);
	        			$arr[]=$tk;
	        		}
	        		return $tk;
	        	}else {
	        		return 0;
	        	}
	        }else{
	        	return 0;
	        }
        }
        public function getAllServerVideoTheoIDVideo($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();
        		$sql='SELECT distinct `loaifilevideo` FROM `filevideo` where idvideo = "'.$idvideo.'"';
        		
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Link không tồn tại';
	        }
        }
        public function getLinkFileVideoServerMacDinh($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select * from filevideo where idvideo = "'.$idvideo.'" LIMIT 1';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Link không tồn tại-sv mac dinh';
	        }
        }
         public function LayThonTinServerPhimTheoIDPhim($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='SELECT loaifilevideo,ngonnguvideo,count(tap) as "totaltap"  FROM `filevideo` where idvideo = '.$idvideo.' group by loaifilevideo,ngonnguvideo';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			$tk = new ClassFileVideo;
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTotalTap($row->totaltap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - ID phim khong ton tai';
	        }
        }
        public function getLinkFileVideoServerTrailer($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select * from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo = "trail"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - ID phim khong ton tai';
	        }
        }
        public function getFileVideoTheoIDFile($idfilevideo){
        	if(ClassFileVideo::ktFileVideo2($idfilevideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select * from filevideo where idfilevideo = "'.$idfilevideo.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - ID không tồn tại';
	        }
        }
        public function getAllFileVideoTheoIDVideo($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select * from filevideo where idvideo = "'.$idvideo.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Video này chưa có server trong bảng.';
	        }
        }
        public function demSoTapDaCoTheoTungServer($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='SELECT loaifilevideo,COUNT(loaifilevideo) as totalloaifile,ngonnguvideo FROM `filevideo` where idvideo = '.$idvideo.' and loaifilevideo != "trail" group by loaifilevideo,ngonnguvideo';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setTotalLoaiFile($row->totalloaifile);
						$tk->setNgonNguVideo($row->ngonnguvideo);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Video này chưa có server trong bảng.';
	        }
        }

        public function demSoTapDaCo($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select count(tap)as tongtap from (select distinct idvideo,loaifilevideo,tap from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo != "trail" ORDER BY tap ASC) as `tabel`';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		
	        		while ($row=mysqli_fetch_object($result)) {
	        			      			
	        			$kq = $row->tongtap;
	        		}
	        		return $kq;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Video này chưa có server trong bảng.';
	        }
        }
        public function LaySoTapDaCoTheoIDNgonNguServer($idvideo,$ngonngu,$loaiserver){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select distinct tap from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo ="'.$loaiserver.'" and ngonnguvideo = "'.$ngonngu.'" ORDER BY tap ASC';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Video này chưa có server trong bảng.';
	        }
        }
        public function layLinkPhimKhongPhaiTrailerTheoIDPhim($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();        		
        		$sql='select * from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo != "trail" ORDER BY tap ASC';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return ' - Lỗi SQL ';
	        	}
	        }else{
	        	return ' - Video này chưa có server trong bảng.';
	        }
        }
        function suaFileVideo($idfilevideo,$idvideo,$loaifilevideo,$ngonnguvideo,$linkfilevideo,$tap){
        	if (ClassFileVideo::ktFileVideo2($idfilevideo)== 1) {
        		$c = ClassConnect::Connect();
			    $query='UPDATE `filevideo` SET `idvideo`="'.$idvideo.'",`linkvideo`="'.$linkfilevideo.'",`loaifilevideo`="'.$loaifilevideo.'" ,`ngonnguvideo`="'.$ngonnguvideo.'",`tap`="'.$tap.'" WHERE `idfilevideo`='.$idfilevideo;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Sữa file video không thành công, lỗi SQL </br>';
			    }
        	}else if($linkfilevideo != ""){
        		$kqthem = ClassFileVideo::themFileVideo($idvideo,$loaifilevideo,$linkfilevideo,$tap);
        		return $kqthem;
        	}
	         	
	    }
	    function themFileVideo($idvideo,$loaifilevideo,$ngonnguvideo,$linkfilevideo,$tap){
        	if (ClassFileVideo::ktFileVideo2($idfilevideo)!= 1) {
        		if($tap==""){
        			$tap = 1;
        		}
        		if($linkfilevideo=="Lỗi: - Link không tồn tại"){
        			$linkfilevideo="";
        		}
        		$c = ClassConnect::Connect();
			    $query='INSERT INTO `filevideo`( `idvideo`, `linkvideo`, `loaifilevideo`,`ngonnguvideo`, `tap`) VALUES ("'.$idvideo.'","'.$linkfilevideo.'","'.$loaifilevideo.'","'.$ngonnguvideo.'","'.$tap.'")';
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Thêm file video không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - File video đã tồn tại trong hệ thống </br>';
        	}
	         	
	    }
        public function getLinkFileVideoMacDinh($idvideo,$sv,$tp){ 
        	if(ClassFileVideo::ktFileVideo($idvideo,$tp)==1){
        		$c = ClassConnect::Connect();
        		if ($tp!=''&&$sv!='') {
        			$sql='select * from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo="'.$sv.'" and tap="'.$tp.'" LIMIT 1';
        		}elseif($tp!=''&&$sv==''){
        			$sql='select * from filevideo where idvideo = "'.$idvideo.'" and tap="'.$tp.'" LIMIT 1';
        		}elseif($tp==''&&$sv!=''){
        			$sql='select * from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo="'.$sv.'" LIMIT 1';
        		}else{
        			$sql='select * from filevideo where idvideo = "'.$idvideo.'" LIMIT 1';
        		} 	
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL ';
	        	}
	        	
	        }else{
	        	return ' - Video không tồn tại';
	        }
        }
        public function getLinkFileVideoTheoServer($idvideo,$sv){ 
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();
        		$sql='select * from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo="'.$sv.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL ';
	        	}
	        	
	        }else{
	        	return ' - Video không tồn tại';
	        }
        }
        public function ktFileVideoVoiBaThongSo($idvideo,$server,$tp){
        	if ($idvideo != '' && $server != '' && $tp != '') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from filevideo where idvideo ="'.$idvideo.'" and loaifilevideo = "'.$server.'" and tap="'.$tp.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 2;
	        }
	    }
        public function ktFileVideo($idvideo,$tp){
        	if ($idvideo!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from filevideo where idvideo ="'.$idvideo.'" and tap="'.$tp.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 2;
	        }
	    }
	    public function ktFileVideo2($idfilevideo){
        	if ($idfilevideo!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from filevideo where idfilevideo ="'.$idfilevideo.'"'; 
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 2;
	        }
	    }
	    public function ktFileVideo3($idvideo){
        	if ($idvideo!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from filevideo where idvideo ='.$idvideo;
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);
		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 2;
	        }
	    }
	    public function getVideoFullBo($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();
        		$sql='select distinct tap,loaifilevideo from filevideo where idvideo = "'.$idvideo.'" and loaifilevideo != "trail" ORDER BY tap';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setTap($row->tap);
	        			$tk->setLoaiFileVideo($row->loaifilevideo);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL ';
	        	}	        	
	        }else{
	        	return ' - Phim không tồn tại';
	        }
        }
        function XoaFileVide($idphim){
        	if (ClassFileVideo::ktFileVideo3($idphim)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `filevideo` WHERE idvideo='.$idphim;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return 'ok';
			    }else{
			    	return ' - Xóa File video không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - File Video không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function XoaFileVideoTheoID($idfilevideo){
        	if (ClassFileVideo::ktFileVideo2($idfilevideo)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `filevideo` WHERE idfilevideo='.$idfilevideo;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return 'ok';
			    }else{
			    	return ' - Xóa File video không thành công, lỗi SQL </br>';
			    }
        	}else{
        		return ' - File Video không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    public function TimKiemFileVideoTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassFileVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from (SELECT filevideo.idfilevideo, filevideo.idvideo, filevideo.linkvideo, filevideo.loaifilevideo, filevideo.ngonnguvideo, filevideo.tap, video.keywork FROM `video`,`filevideo` WHERE video.idvideo = filevideo.idvideo) as `table_tam` where ('.$wheresql.') ORDER BY tap';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$tk->setIDVideo($row->idvideo);
						$tk->setLinkVideo($row->linkvideo);
						$tk->setLoaiFileVideo($row->loaifilevideo);
						$tk->setNgonNguVideo($row->ngonnguvideo);
						$tk->setTap($row->tap);
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
	        				$wheresql .= 'idfilevideo like "%'.trim($key).'%" or idvideo like "%'.trim($key).'%" or linkvideo like "%'.trim($key).'%" or loaifilevideo like "%'.trim($key).'%" or ngonnguvideo like "%'.trim($key).'%" or tap like "%'.trim($key).'%" or keywork like "%'.trim($key).'%"';
	        			}else{
	        				$wheresql .= 'idfilevideo like "%'.trim($key).'%" or idvideo like "%'.trim($key).'%" or linkvideo like "%'.trim($key).'%" or loaifilevideo like "%'.trim($key).'%" or ngonnguvideo like "%'.trim($key).'%" or tap like "%'.trim($key).'%" or keywork like "%'.trim($key).'%"';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
	    public function DemSoLinkTheoIDVideo($idvideo){
        	if(ClassFileVideo::ktFileVideo3($idvideo)==1){
        		$c = ClassConnect::Connect();
        		$sql="SELECT `idfilevideo` FROM `filevideo` where `loaifilevideo` != 'trail' and `idvideo` = $idvideo";
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassFileVideo;
	        			$tk->setIDFileVideo($row->idfilevideo);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL ';
	        	}	        	
	        }else{
	        	return ' - Phim không tồn tại';
	        }
        }
	}
 ?>

