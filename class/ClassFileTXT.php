<?php 

	class ClassFileTXT
	{	
		public static $link = "/home/nvphung/nginx/www/pphim.org/v2/";

        public function txtDocFile($filename){
        	$duongdangoc=self::$link."txt/".$filename.".txt";
        	if (file_exists($duongdangoc)) {
        		$arrr=array();
        		$read = file($duongdangoc);
			    foreach ($read as $line) {
			    array_push($arrr,$line);
			    }
			    return $arrr;
        	}else{
        		return "File :'".$duongdangoc."' khong ton tai";
        	}
        }
        public function txtLuuDataVaoFile($data){
        	   
		   	if($data!=""){
		   		$duongdangoc=self::$link."txt/datathemphim.txt";
        		$myfile = fopen($duongdangoc, "w");
        		$kq=fwrite($myfile, $data);
        		fclose($myfile);
        		if($kq){
        			return 1;
        		}else{
        			return "Them khong thanh cong: chmod 777 -R ".$duongdangoc;
        		}
		   	}else{
		   		return "data trong";
		   	}
		    
        }
        public function txtGhiLog($data){
        	   
		   	if($data!=""){
		   		$duongdangoc=self::$link."txt/logerrthemphimnangcao.txt";
        		$myfile = fopen($duongdangoc, "a+");
        		$kq=fwrite($myfile, $data."\r\n");
        		fclose($myfile);
        		if($kq){
        			return 1;
        		}else{
        			return "Ghi log khong thanh cong: chmod 777 -R ".$duongdangoc;
        		}
		   	}else{
		   		return "data trong";
		   	}
		    
        }
        public function txtXoaLog($tenfile){
        	   
		   	
		   		$duongdangoc=self::$link."txt/".$tenfile.".txt";
        		$myfile = fopen($duongdangoc, "w");
        		$kq=fwrite($myfile, " ");
        		fclose($myfile);
        		if($kq){
        			return 1;
        		}else{
        			return "Xoa log khong thanh cong: chmod 777 -R ".$duongdangoc;
        		}
		  
		    
        }
// $tenvideo,$tenvideo_en,$status,$dienvien,$theloai,$quocgia,$nhasanxuat,$thoigian,$chatluong,$thangnamsanxuat,$trainler,$keywork,$luotxem,$sotap,$hashtag,$stthashtag,$mota
        public function txtTachRecordThanhFields($text){
        	if ($text!="") {	        		
	        	$arrphantu = explode("|", $text);
	        	if (count($arrphantu)>= 2) {
	        		return $arrphantu;
	        	}else{
	        		return "Chuoi chi co 1 phan tu";
	        	}
	        }else{
	        	return "text trong";
	        }
        }
        public function txtTaoHashtag($tenphim){
        	if ($tenphim!="") {
        		if (strpos($tenphim, ' ')>=1){
		     		$arr = explode(' ', $tenphim);
		     		foreach ($arr as $key) {
		     			$hag=$hag.substr($key, 0,2);
		     		}
		     	}else{
		     		$hag =$tenphim.$tenphim;
		     	}
		     	return $hag;
        	}else{
        		return " - Khong the tao Hashtag";
        	}
	        
	    }
        public function txtThemPhim($filename){
        	$arrdata = ClassFileTXT::txtDocFile($filename);
        	if (is_array($arrdata)) {
        	
	        	for ($i=0; $i < count($arrdata) ; $i++) { 
	        		$record = $arrdata[$i];
	        		$arrfield = ClassFileTXT::txtTachRecordThanhFields($record);
	        		$arrfield = array_filter($arrfield,'strlen');// xoa phan tu trong trong mang 
	        		$sophantufield = count($arrfield); 
	        		
	        		if ($sophantufield == 17) {
	        			$tenvideo =$arrfield[0];
						$tenvideo_en =$arrfield[1];
						$status =$arrfield[2];
						$dienvien =$arrfield[3];
						$theloai =$arrfield[4];
						$quocgia =$arrfield[5];
						$daodien =$arrfield[6];
						$tthoiluong =$arrfield[7];
						$chatluong =$arrfield[8];
						$thangnamsanxuat =$arrfield[9];
						$trainler =$arrfield[10];
						$keywork =$arrfield[11];
						$luotxem =$arrfield[12];
						$tongtap =$arrfield[13];
						if ($tenvideo_en!="") {
							$hashtag =ClassFileTXT::txtTaoHashtag($tenvideo_en);
							$hashtag = filter_var($hashtag, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
							$hashtag = str_replace("'", '', $hashtag);
							$hashtag = str_replace('"', '', $hashtag);
						}else{
							$hashtag = "";
						}				
						$stthashtag =$arrfield[15];
						$mota =$arrfield[16];

						$kq = ClassVideo::themVideoKhongKiemTra($tenvideo,$tenvideo_en,$status,$dienvien,$theloai,$quocgia,$daodien,$tthoiluong,$chatluong,$thangnamsanxuat,'',$keywork,'0',$tongtap,$hashtag,1,$mota);
						if ($kq==1) {
					        ClassFileTXT::txtGhiLog('Đã thêm phim:'.$tenvideo.'-'.$tenvideo_en);
					       
					    }else{
					        ClassFileTXT::txtGhiLog('Thêm Phim không thành công: Ten Phim: '.$tenvideo.'-'.$tenvideo_en.' ERR: '.$kq);
					    }

	        		}else{
	        			ClassFileTXT::txtGhiLog("Record <".$i."> khong du field");
	        		}
	        	}
	        	return 1;
	        }else{
	        	return " - Doc File khong thanh cong";
	        }
        }
	}
 ?>

