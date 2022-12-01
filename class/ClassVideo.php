<?php 

	class ClassVideo extends ClassFileVideo
	{

		public $idvideo, $tenvideo, $tenvideo_en, $mota, $nhasanxuat, $quocgia, $theloai, $thoigian, $chatluong, $thangnamsanxuat, $trainler, $keywork, $luotxem, $sotap, $hashtag, $stthashtag, $status, $dienvien,$date_up,$columnname,$total,$having;
		private $result;
		public static $table_search = "(SELECT video.idvideo,video.tenvideo,video.tenvideo_en,video.sotap,video.quocgia, video.theloai, video.thangnamsanxuat, video.keywork, video.date_up, filevideo.loaifilevideo,filevideo.ngonnguvideo, quocgia.tenquocgia,quocgia.ten_vn,quocgia.tag FROM `filevideo`,`video`,`quocgia` where video.idvideo=filevideo.idvideo and video.quocgia=quocgia.ten_vn) as `table_tam`";

		// $c = ClassConnect::Connect();
		function setIDVideo($idvideo)
		{
			$this->idvideo=$idvideo;
		}
		function getIDVideo(){
			return $this->idvideo;
		}
		function setTenVideo($tenvideo)
		{
			$this->tenvideo=$tenvideo;
		}
		function getTenVideo(){
			return $this->tenvideo;
		}
		function setTenVideo_En($tenvideo_en)
		{
			$this->tenvideo_en=$tenvideo_en;
		}
		function getTenVideo_En(){
			return $this->tenvideo_en;
		}
		function setMoTa($mota)
		{
			$this->mota=$mota;
		}
		function getMoTa(){
			return $this->mota;
		}
		function setNhaSX($nhasanxuat)
		{
			$this->nhasanxuat=$nhasanxuat;
		}
		function getNhaSX(){
			return $this->nhasanxuat;
		}
		function setQuocGia($quocgia)
		{
			$this->quocgia=$quocgia;
		}
		function getQuocGia(){
			return $this->quocgia;
		}
		function setTheLoai($theloai)
		{
			$this->theloai=$theloai;
		}
		function getTheLoai(){
			return $this->theloai;
		}
		function setThoiGian($thoigian)
		{
			$this->thoigian=$thoigian;
		}
		function getThoiGian(){
			return $this->thoigian;
		}
		function setChatLuong($chatluong)
		{
			$this->chatluong=$chatluong;
		}
		function getChatLuong(){
			return $this->chatluong;
		}
		function setThangNamSX($thangnamsanxuat)
		{
			$this->thangnamsanxuat=$thangnamsanxuat;
		}
		function getThangNamSX(){
			return $this->thangnamsanxuat;
		}
		function setTrailer($trainler)
		{
			$this->trainler=$trainler;
		}
		function getTrailer(){
			return $this->trainler;
		}
		function setKeyWork($keywork)
		{
			$this->keywork=$keywork;
		}
		function getKeyWork(){
			return $this->keywork;
		}
		function setLuotXem($luotxem)
		{
			$this->luotxem=$luotxem;
		}
		function getLuotXem(){
			return $this->luotxem;
		}
		
		function setSoTap($sotap){
			$this->sotap=$sotap;
		}
		function getSoTap(){
			return $this->sotap;
		}
		function setHashtag($hashtag){
			$this->hashtag = $hashtag;
		}
		function getHashtag(){
			return $this->hashtag;
		}
		function setSTTHashtag($stthashtag){
			$this->stthashtag = $stthashtag;
		}
		function getSTTHashtag(){
			return $this->stthashtag;
		}
		function setStatus($status){
			$this->status = $status;
		}
		function getStatus(){
			return $this->status;
		}
		function setDienVien($dienvien){
			$this->dienvien = $dienvien;
		}
		function getDienVien(){
			return $this->dienvien;
		}
		function setDateUp($date_up){
			$this->date_up = $date_up;
		}
		function getDateUp(){
			return $this->date_up;
		}
		function setNameColumOfTable($columnname)
		{
			$this->columnname=$columnname;
		}
		function getNameColumOfTable(){
			return $this->columnname;
		}
		function setTotalTapPhim($total)
		{
			$this->total=$total;
		}
		function getTotalTapPhim(){
			return $this->total;
		}
		function setHavingTapPhim($having)
		{
			$this->having=$having;
		}
		function getHavingTapPhim(){
			return $this->having;
		}
        public function TruyVan($sql){
        	$c = ClassConnect::Connect();
        	$this->result=mysqli_query($c,$sql);
        	
        }
        public function SoDong(){
        	$sql='select * from video';
        	ClassVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
        public function DemSoVideoDisable(){
        	$sql='select * from video where status = 0';
        	ClassVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
		public function DemSoVideoChuaCoLinkPhim(){
        	$sql='SELECT idvideo FROM `video` where idvideo not in (SELECT distinct idvideo FROM `filevideo`)';
        	ClassVideo::TruyVan($sql);
        	if($this->result){
        		$row = mysqli_num_rows($this->result);

        	}else{
        		$row=0;
        	}
        	return $row;
        }
       	public function DemSoVideoChuaCoPoster(){
        	$sql='SELECT idvideo FROM `video` where idvideo not in (SELECT distinct idvideo FROM `poster`)';
        	ClassVideo::TruyVan($sql);
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
        		$sql='select * from video where status =1';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return 2;
	        	}        	
        }
        public function layDuLieu_admin(){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select * from video where 1';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return 2;
	        	}        	
        }
        function themVideoKhongKiemTra($tenvideo,$tenvideo_en,$status,$dienvien,$theloai,$quocgia,$nhasanxuat,$thoigian,$chatluong,$thangnamsanxuat,$trainler,$keywork,$luotxem,$sotap,$hashtag,$stthashtag,$mota){
        	if (ClassVideo::ktTonTaiVideoBangTen($tenvideo,$tenvideo_en)!= 1) {
        		$c = ClassConnect::Connect();
			    $query='INSERT INTO `video`( `tenvideo`,`tenvideo_en`,`status`,`dienvien`, `theloai`,`quocgia`,`nhasanxuat`, `thoigian`, `chatluong`, `thangnamsanxuat`, `trainler`, `keywork`, `luotxem`, `sotap`, `hashtag`, `stthashtag`,`mota`,`date_up`) values ("'.$tenvideo.'","'.$tenvideo_en.'","'.$status.'","'.$dienvien.'","'.$theloai.'","'.$quocgia.'","'.$nhasanxuat.'","'.$thoigian.'","'.$chatluong.'","'.$thangnamsanxuat.'","'.$trainler.'","'.$keywork.'","'.$luotxem.'","'.$sotap.'","'.$hashtag.'","'.$stthashtag.'","'.$mota.'",now())';
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	$id = ClassVideo::LayIDPhimTheoTenPhim($tenvideo,$tenvideo_en);
			    	return $id;
			    }else{
			    	return ' - Thêm không thành công, lỗi SQL</br>'.$query;
			    }
        	}else{
        		return ' - Video đã tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    function chinhSuaPhim($idvideo,$tenvideo,$tenvideo_en,$status,$dienvien,$theloai,$quocgia,$nhasanxuat,$thoigian,$chatluong,$thangnamsanxuat,$keywork,$luotxem,$sotap,$hashtag,$mota){
        	if (ClassVideo::ktVideo($idvideo)== 1) {
        		if($luotxem==''){
        			$luotxem='0';
        		}
        		$c = ClassConnect::Connect();
			    $query='UPDATE `video` SET `tenvideo`="'.$tenvideo.'",`tenvideo_en`="'.$tenvideo_en.'",`mota`="'.$mota.'",`nhasanxuat`="'.$nhasanxuat.'",`quocgia`="'.$quocgia.'",`theloai`="'.$theloai.'",`thoigian`="'.$thoigian.'",`chatluong`="'.$chatluong.'",`thangnamsanxuat`="'.$thangnamsanxuat.'",`keywork`="'.$keywork.'",`luotxem`="'.$luotxem.'",`sotap`="'.$sotap.'",`hashtag`="'.$hashtag.'" ,`status`="'.$status.'",`dienvien`="'.$dienvien.'",`date_up`=now() WHERE `idvideo`='.$idvideo;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return $kq;
			    }else{
			    	return ' - Chỉnh sửa không thành công, lỗi SQL</br>';
			    }
        	}else{
        		return ' - Video không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	    public function layIDVideoTheoTen($tenvideo,$tenvideoen){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select idvideo from video where tenvideo = "'.$tenvideo.'" and tenvideo_en ="'.$tenvideoen.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}

        	
        }
	    public function layVideoTrongThang(){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select idvideo,tenvideo from video where status =1 ORDER BY thangnamsanxuat DESC LIMIT 12';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return 2;
	        	}

        	
        }
        public function layVideoTOP18TrongThang(){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select idvideo,tenvideo from video where status =1 ORDER BY thangnamsanxuat DESC LIMIT 18';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return 2;
	        	}        	
        }
        public function layVideoTOP18TrongThangTheoTheLoai($tagtheloai){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select idvideo,tenvideo from video where theloai like "%'.$tagtheloai.'%" and status =1 ORDER BY date_up DESC LIMIT 18';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return 2;
	        	}        	
        }
        public function layVideoTOP12TrongThangTheoTheLoai($tagtheloai){
        	//if($this->result){
        		$c = ClassConnect::Connect();
        		$sql='select idvideo,tenvideo from video where theloai like "%'.$tagtheloai.'%" and status =1 ORDER BY date_up DESC LIMIT 12';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else {
	        		return 2;
	        	}        	
        }
        public function laySoPTVideoTheoTag($tagtheloai){        		
        	$c = ClassConnect::Connect();
        	$sql='select idvideo from video where theloai like "%'.$tagtheloai.'%" ORDER BY date_up DESC';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {	        		
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else {
	        	return 0;
	        }
        }
        public function layVideoTheoTheLoai($tagtheloai,$vitri){        		
        	$c = ClassConnect::Connect();
        	$sql='select idvideo,tenvideo from video where theloai like "%'.$tagtheloai.'%" and status = 1 ORDER BY date_up DESC LIMIT '.$vitri.',24';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {	        		
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else {
	        	return 0;
	        }
        }
        public function ktVideo($idvideo){
        	if ($idvideo!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from video where idvideo ="'.$idvideo.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	

		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function ktTonTaiVideoBangTen($tenvideo,$tenvideoen){
        	if ($tenvideoen!=''&&$tenvideo!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from video where tenvideo ="'.$tenvideo.'" and tenvideo_en="'.$tenvideoen.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){return 1;}
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function LayIDPhimTheoTenPhim($tenvideo,$tenvideoen){
        	if ($tenvideoen!=''&&$tenvideo!='') {
		    	$c1 = ClassConnect::Connect();
		        $query='select idvideo from video where tenvideo ="'.$tenvideo.'" and tenvideo_en="'.$tenvideoen.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){
		        	$row=mysqli_fetch_object($result);
		        	return $row->idvideo;
		        }
		        else{return 0;}
	        }else{
	        	return 0;
	        }
	    }
	    public function ktPhimBoDuTapPhimChua($idvideo){
        	if(ClassVideo::ktVideo($idvideo)==1){
		    	$c1 = ClassConnect::Connect();
		    	$sotapdaco=ClassFileVideo::demSoTapDaCo($idvideo);
		    	$sotapphaico=ClassVideo::laySoTapPhim($idvideo);
		        $query='select idvideo from video where tenvideo ="'.$tenvideo.'" and tenvideo_en="'.$tenvideoen.'"';
		        $result=  mysqli_query($c1,$query);
		        $num=  mysqli_num_rows($result);	
		        if($num>0){
		        	return 1;
		        }else{
		        	return "Err_1";
		        }
	        }else{
	        	return "Err_2";
	        }
	    }
	    public function laySoTapPhim($idvideo){
        	if(ClassVideo::ktVideo($idvideo)==1){
        		$c = ClassConnect::Connect();
        		$sql='select `sotap` from video where idvideo="'.$idvideo.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){	        		
	        		while ($row=mysqli_fetch_object($result)) {	        			
	        			$kq = $row->sotap;	        			
	        		}
	        		return $kq;
	        	}else{
	        		return ' - Lỗi SQL';
	        	}        		
        	}else{
        		return ' - Phim không tồn tại';
        	}
        }
	    public function layVideoTheoID($idvideo){
        	if(ClassVideo::ktVideo($idvideo)==1){
        		$c = ClassConnect::Connect();
        		$sql='select * from video where idvideo="'.$idvideo.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL';
	        	}        		
        	}else{
        		return ' - Phim không tồn tại';
        	}
        }
        public function layVideoChuaCoBaner(){
        		$c = ClassConnect::Connect();
        		$sql='SELECT idvideo,tenvideo,tenvideo_en,nhasanxuat,date_up FROM `video` where idvideo not in (select distinct idvideo from slider)ORDER BY date_up DESC limit 15';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL';
	        	}   
        }
        public function layVideoChuaCoPoster(){
        		$c = ClassConnect::Connect();
        		$sql='SELECT idvideo,tenvideo,tenvideo_en,nhasanxuat,date_up FROM `video` where idvideo not in (select distinct idvideo from poster)ORDER BY date_up DESC';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL';
	        	}   
        }
        public function kiemTraTonTai($field,$tenvideo){
        	if ($field!='') {
        		$c = ClassConnect::Connect();
        		$sql='select * from video where '.$field.'="'.$tenvideo.'"';
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return ' - Lỗi SQL';
	        	}
	        }else{
	        	return ' - Phim không tồn tại';
	        }
        }
        public function layVideoPhimLeTheoKeyword($keyword){
        	$wheresql = ClassVideo::PhanTichKeywork($keyword);
        	$c = ClassConnect::Connect();
        	$sql='select * from video where ('.$wheresql.') and sotap <= 1 ORDER BY keywork LIMIT 10';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        			
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else return 2;
        }
        public function TimKiemVideoChuaCoBannerTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where ('.$wheresql.') and hashtag != "" and idvideo not in (select distinct idvideo from slider where 1) ORDER BY hashtag';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi SQL';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }
      
        
        public function layVideoPhimBoTheoKeyword($keywork){
        	$wheresql = ClassVideo::PhanTichKeywork($keywork);
        	$c = ClassConnect::Connect();
        	$sql='select * from video where ('.$wheresql.') and sotap >= 2';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setSoTap($row->sotap);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }
        	
        	
        }
        public function layVideoLienQuanTheoKeywork($keywork,$id){
        	$wheresql = ClassVideo::PhanTichKeywork($keywork);        	
        	$c = ClassConnect::Connect();
        	$sql='select * from video where ('.$wheresql.') and idvideo != "'.$id.'" LIMIT 6';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }  
        }
        public function layPhimLeMoiCapNhat(){        	
        	$c = ClassConnect::Connect();
        	$sql='select * from video where sotap = 1 and status = 1 ORDER BY date_up DESC LIMIT 10';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }  
        }
        public function layPhimBoMoiCapNhat(){        	
        	$c = ClassConnect::Connect();
        	$sql='select * from video where sotap >= 2 and status = 1 ORDER BY date_up DESC LIMIT 10';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        }  
        }
        
        public function TimKiemVideoGoiYKhiKhongTimRa(){
        	
        		$wheresql = ClassVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where status =1 ORDER BY date_up DESC LIMIT 12';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi không thể tìm được phim';
		        }
        	
        }
        public function TimKiemVideoTheoKeyword($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where ('.$wheresql.') and status =1 ORDER BY date_up DESC LIMIT 12';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 0;
		        }
        	}else{
        		return 0;
        	}
        }
        public function TimKiemVideoTheoQuery($query,$vitri){
        	if ($query!='') {       	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where ('.$query.') and status =1 ORDER BY date_up DESC LIMIT '.$vitri.',15';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 0;
		        }
        	}else{
        		return 0;
        	}
        }
        public function TimKiemVideoTheoQuery_khongvitri($query){
        	if ($query!='') {       	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where ('.$query.') and status =1 ORDER BY date_up DESC';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return 0;
		        }
        	}else{
        		return 0;
        	}
        }
         public function PhanTichKeywork_new($keywork){
        	if ($keywork!='') {
        		$arrtentruong=array('loaifilevideo','ngonnguvideo','thangnamsanxuat','keywork','tenquocgia','tag','date_up','sotap');
        		$arkey = explode(',', trim($keywork));
        		$i=1;$kkqptkeyword='';
        		foreach ($arkey as $keyword) {
        			if ($keyword!=' ') {
	        			foreach ($arrtentruong as $tentruong) {
	        				$kqptkeyword .= $tentruong.' like "%'.$keyword.'%" or ';
	        			}
        			}       			
        		}
        		$kqptkeyword = trim($kqptkeyword, 'or ');
        		return $kqptkeyword;
	        }else{
	        	return 2;
	        }
	    }
	    
        public function TimKiemPhimTheoDieuKien_Final($dieukien){
        	if ($dieukien!='') {      	
	        	$c = ClassConnect::Connect();
	        	$sql='Select DISTINCT idvideo,tenvideo,tenvideo_en,date_up,thangnamsanxuat FROM '.self::$table_search.' where '.$dieukien;
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi không thể tìm được phim';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }
        public function TimKiemVideoTheoKeyword_Final($keywork,$vitri){
        	if ($keywork!='') {
        		$kqptkeyword = ClassVideo::PhanTichKeywork_new($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='Select DISTINCT idvideo,tenvideo,tenvideo_en,date_up,thangnamsanxuat FROM '.self::$table_search.' where '.$kqptkeyword.' ORDER BY date_up DESC LIMIT '.$vitri.',15';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi không thể tìm được phim';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }

        public function TimKiemVideoTheoKeyword_Final_khongvitri($keywork){
        	if ($keywork!='') {
        		$kqptkeyword = ClassVideo::PhanTichKeywork_new($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='Select DISTINCT idvideo,tenvideo,tenvideo_en,date_up,thangnamsanxuat FROM '.self::$table_search.' where '.$kqptkeyword.' ORDER BY date_up DESC';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi không thể tìm được phim';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }
        public function TimKiemVideoTheoSQL($sql){
        	if ($sql!='') {
        		      	
	        	$c = ClassConnect::Connect();
	        	
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi không thể tìm được phim';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }
        public function TimKiemVideoTheoKeyword_admin($keywork){
        	if ($keywork!='') {
        		$wheresql = ClassVideo::PhanTichKeywork($keywork);        	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where ('.$wheresql.'or idvideo like ("'.$keywork.'")) ORDER BY date_up DESC limit 15';
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return ' - Lỗi không thể tìm được phim';
		        }
        	}else{
        		return ' - Từ khóa trống';
        	}
        }
        public function TimKiemVideoTheoFilter($column,$filter){
        	if ($column!='') {
        		      	
	        	$c = ClassConnect::Connect();
	        	$sql='select * from video where '.$column.' '.$filter;
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTenVideo_En($row->tenvideo_en);
						$tk-> setMoTa($row->mota);
						$tk-> setNhaSX($row->nhasanxuat);
						$tk-> setQuocGia($row->quocgia);
						$tk-> setTheLoai($row->theloai);
						$tk-> setThoiGian($row->thoigian);
						$tk-> setChatLuong($row->chatluong);
						$tk-> setThangNamSX($row->thangnamsanxuat);
						$tk-> setTrailer($row->trainler);
						$tk-> setKeyWork($row->keywork);
						$tk-> setLuotXem($row->luotxem);
						$tk-> setSoTap($row->sotap);
						$tk-> setHashtag($row->hashtag);
						$tk-> setSTTHashtag($row->stthashtag);
						$tk-> setStatus($row->status);
						$tk-> setDienVien($row->dienvien);
						$tk-> setDateUp($row->date_up);
		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return '<tr><td> - Lỗi không thể tìm được phim</td></tr>';
		        }
        	}else{
        		return ' - Column trong';
        	}
        }
		public function CatChuoi($chuoi){
		  if ($chuoi!='') {
		    $ar = explode(' ',$chuoi);
		    $int = count($ar);
		    if ($int>=40) {
		      return $ar[40];
		    }else {
		      return array_pop($ar);
		    }
		  }
		}
		
		public function PhanTichKeywork_filter($keywork){
        	if ($keywork!='') {
        		$arkey = explode(',', trim($keywork));
        		$i=1;
        		foreach ($arkey as $key) {
        			if ($key!=' ') {
	        			if ($i<=1) {
	        				$wheresql .= 'keywork like "%'.trim($key).'%" ';
	        			}else{
	        				$wheresql .= 'and keywork like "%'.trim($key).'%" ';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
        public function PhanTichKeywork($keywork){
        	if ($keywork!='') {
        		$arkey = explode(',', trim($keywork));
        		$i=1;
        		foreach ($arkey as $key) {
        			if ($key!=' ') {
	        			if ($i<=1) {
	        				$wheresql .= 'keywork like "%'.trim($key).'%" ';
	        			}else{
	        				$wheresql .= 'or keywork like "%'.trim($key).'%" ';
	        			}
	        			$i++; 
        			}       			
        		}
        		return $wheresql;
	        }else{
	        	return 2;
	        }
	    }
	   
	    function XoaPhim($idphim){
        	if (ClassVideo::ktVideo($idphim)== 1) {
        		$c = ClassConnect::Connect();
			    $query='DELETE FROM `video` WHERE idvideo='.$idphim;
			    $kq = mysqli_query($c,$query);
			    if($kq){
			    	return 'ok';
			    }else{
			    	return ' - Xóa không thành công, lỗi SQL:/br>';
			    }
        	}else{
        		return ' - Video không tồn tại trong hệ thống</br>';
        	}
	         	
	    }
	     public function layTenCotCuaBang($tablename){
        		$c = ClassConnect::Connect();
        		$sql="SELECT COLUMN_NAME as columnnames FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$tablename."'  and TABLE_SCHEMA = 'pphim.org_vs2' ORDER BY ORDINAL_POSITION";
        		$result=mysqli_query($c,$sql);
        		if(mysqli_num_rows($result)>0){
	        		$arr=array();
	        		while ($row=mysqli_fetch_object($result)) {
	        			
	        			//$tk = new ClassVideo;
	        			$tk=array();
						array_push($tk,$row->columnnames);
	        			$arr[]=$tk;
	        		}
	        		return $arr;
	        	}else{
	        		return '- Lỗi SQL: ';
	        	}        	
        }
        public function filterPhimBoDangCapNhat(){
        	$c = ClassConnect::Connect();
	        	$sql="select video.idvideo,video.tenvideo,video.sotap as 'total', tbtam.having, video.date_up from (select `idvideo`, count(idvideo) as 'having' from `filevideo` group by idvideo) as tbtam, video where video.idvideo = tbtam.idvideo and video.sotap >1 ORDER BY date_up DESC limit 15";
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTotalTapPhim($row->total);
						$tk-> setHavingTapPhim($row->having);
						$tk-> setDateUp($row->date_up);

		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return '<tr><td> - Lỗi không thể tìm được phim</td></tr>';
		        }
        }
        public function filterPhimBoDangCapNhatTheoQuocGia($quocgia){
        	$c = ClassConnect::Connect();
	        	$sql="select video.idvideo,video.tenvideo,video.sotap as 'total', tbtam.having, video.date_up from (select `idvideo`, count(idvideo) as 'having' from `filevideo` group by idvideo) as tbtam, video where video.idvideo = tbtam.idvideo and video.sotap >1 and video.quocgia = '".$quocgia."'ORDER BY date_up DESC";
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setTotalTapPhim($row->total);
						$tk-> setHavingTapPhim($row->having);
						$tk-> setDateUp($row->date_up);

		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return '<tr><td> - Lỗi không thể tìm được phim</td></tr>';
		        }
        }
        public function filterPhimSapCo(){
        	$c = ClassConnect::Connect();
	        	$sql="select * from video where idvideo not in (SELECT idvideo FROM `filevideo` where loaifilevideo != 'trail') and status = 1 ORDER BY date_up DESC Limit 15";
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setDateUp($row->date_up);

		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return '<tr><td> - Lỗi không thể tìm được phim</td></tr>';
		        }
        }
        public function filterPhimSapCoTheoTheLoai($theloai){
        	$c = ClassConnect::Connect();
	        	$sql="select * from video where idvideo not in (SELECT idvideo FROM `filevideo` where loaifilevideo != 'trail') and status = 1 and theloai like '%".$theloai."%' ORDER BY date_up DESC";
	        	$result=mysqli_query($c,$sql);
	        	if(mysqli_num_rows($result)>0){
		        	$arr=array();
		        	while ($row=mysqli_fetch_object($result)) {		        		
		        		$tk = new ClassVideo;
						$tk-> setIDVideo($row->idvideo);
						$tk-> setTenVideo($row->tenvideo);
						$tk-> setDateUp($row->date_up);

		        		$arr[]=$tk;
		        	}
		        	return $arr;
		        }else{
		        	return '<tr><td> - Lỗi không thể tìm được phim</td></tr>';
		        }
        }
        public function layVideoTheoLuotXemTop20(){
        	$c = ClassConnect::Connect();
        	$sql='select * from video where status = 1 ORDER BY luotxem DESC LIMIT 20';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        			
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return ' - Lỗi SQL';
	        } 
        }
        public function layVideoPhimLeChuaCoLinkPhim(){
        	$c = ClassConnect::Connect();
        	$sql="SELECT * FROM `video` where `sotap` = 1 and `idvideo` not in (SELECT `idvideo` FROM `filevideo` where `loaifilevideo` != 'trail') ORDER BY date_up DESC";
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        			
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return ' - Lỗi SQL';
	        } 
        }
        public function layVideoPhimChuaCoTrailer(){
        	$c = ClassConnect::Connect();
        	$sql="SELECT * FROM `video` where `idvideo` not in (SELECT `idvideo` FROM `filevideo` where `loaifilevideo` = 'trail') ORDER BY date_up DESC";
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        			
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return ' - Lỗi SQL';
	        } 
        }
        public function layVideoPhimBo(){
        	$c = ClassConnect::Connect();
        	$sql='SELECT * from video where `sotap` >1 and `status` = 1 ORDER BY date_up DESC';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        } 
        }
        public function layVideoPhimLe(){
        	$c = ClassConnect::Connect();
        	$sql='SELECT * from video where `sotap` =1 and `status` = 1 ORDER BY date_up DESC';
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        } 
        }
        public function layVideoPhimBoTheoViTri($vitri,$spt){
        	$c = ClassConnect::Connect();
        	$sql='SELECT * from video where `sotap` >1 ORDER BY date_up DESC LIMIT '.$vitri.','.$spt;
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        } 
        }
        public function layVideoPhimTheoViTri($vitri,$spt){
        	$c = ClassConnect::Connect();
        	$sql='SELECT * from video ORDER BY date_up DESC LIMIT '.$vitri.','.$spt;
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        } 
        }
        public function layVideoPhimLeTheoViTri($vitri,$spt){
        	$c = ClassConnect::Connect();
        	$sql='SELECT * from video where `sotap` =1 ORDER BY date_up DESC LIMIT '.$vitri.','.$spt;
        	$result=mysqli_query($c,$sql);
        	if(mysqli_num_rows($result)>0){
	        	$arr=array();
	        	while ($row=mysqli_fetch_object($result)) {
	        		$tk = new ClassVideo;
					$tk-> setIDVideo($row->idvideo);
					$tk-> setTenVideo($row->tenvideo);
					$tk-> setTenVideo_En($row->tenvideo_en);
					$tk-> setMoTa($row->mota);
					$tk-> setNhaSX($row->nhasanxuat);
					$tk-> setQuocGia($row->quocgia);
					$tk-> setTheLoai($row->theloai);
					$tk-> setThoiGian($row->thoigian);
					$tk-> setChatLuong($row->chatluong);
					$tk-> setThangNamSX($row->thangnamsanxuat);
					$tk-> setTrailer($row->trainler);
					$tk-> setKeyWork($row->keywork);
					$tk-> setLuotXem($row->luotxem);
					$tk-> setSoTap($row->sotap);
					$tk-> setHashtag($row->hashtag);
					$tk-> setSTTHashtag($row->stthashtag);
					$tk-> setStatus($row->status);
					$tk-> setDienVien($row->dienvien);
					$tk-> setDateUp($row->date_up);
	        		$arr[]=$tk;
	        	}
	        	return $arr;
	        }else{
	        	return 2;
	        } 
        }
	}
 ?>

