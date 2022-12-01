<?php 

	class ClassSitemap
	{

		public $a;
		private $result;
		
        public function DocFile($file){
			if(file_exists($file)){
				$arrdata = file($file);
			    if (is_array($arrdata)) {
			    	$arrfinal = ClassSitemap::xuLyArr($arrdata);
			    	return $arrfinal;
			    }else{
			    	return 'Lỗi không đọc đươc data';
			    }
			}else{
				return 'File không tồn tại'.$file;
			}        	
        }
        public function xuLyArr($arr){
        	$arrfinal = array();			
			if (is_array($arr)) {
				$spt= count($arr);
				$check =0;
				$arrtam=array();
			    for ($i=0; $i < $spt ; $i++) { 
			    	$pt=preg_replace('/\s+/', '', $arr[$i]);
			    	if ($pt=="<url>") {
			    		$check = 1;
			    	}elseif ($pt=="</url>") {
			    		$check=2;
			    	}
			    	if ($check==1) {
			    		array_push($arrtam, $pt);
			    	}elseif ($check==2&&count($arrtam)>0) {
			    		array_push($arrtam, "</url>");
			    			array_push($arrfinal, $arrtam);
			    			$arrtam=array();
			    				    		
			    	}
			    }
			    return $arrfinal;
			}else{
			   	return 'Không xóa được dữ liệu vào không phải mảng';
			} 	
        }
        public function GhiArrVaoFile($file,$arr){
			if(file_exists($file)&&is_array($arr)){
				$myfile = fopen($file, "w");
				foreach ($arr as $key) {
					$key=preg_replace('/\s+/', ' ', $key);
				    fwrite($myfile, $key."\n");		
				}	    
			    fclose($myfile);
			    return "Done";
			}else{
				return 'nội dung không đúng hoặc file không tồn tại'.$file;
			}        	
        }
        public function GhiTextVaoFile($file,$data){
			if(file_exists($file)&&$data!=""){
				$myfile = fopen($file, "w");				
				fwrite($myfile, $data);	
			    fclose($myfile);
			    return "Done";
			}else{
				return 'nội dung không đúng hoặc file không tồn tại'.$file;
			}        	
        }
        public function CapNhatTuDong($file,$loc,$lastmod,$priority){
			if(file_exists($file)){
				$arrdata = file($file); 
			    if (is_array($arrdata)&&$loc!= ""&&$lastmod!=""&$priority!="") {
			    	$sptcuoi = count($arrdata);
			    	unset($arrdata[$sptcuoi-1]); //xoa phan tu cuoi cung </urlset>
			    	$url = "<url>";
			    	$locs="<loc>".$loc."</loc>";
			    	$lastmods="<lastmod>".$lastmod."</lastmod>";
			    	$prioritys="<priority>".$priority."</priority>";
			    	$urls = "</url>";
			    	$urlset = "</urlset>";
			    	
			    	array_push($arrdata, $url);
			    	
			    	array_push($arrdata, $locs);
			    	array_push($arrdata, $lastmods);
			    	array_push($arrdata, $prioritys);
			    	array_push($arrdata, $urls);
			    	array_push($arrdata, $urlset);
			    	 //return $arrdata;
			    	 $kq = ClassSitemap::GhiArrVaoFile($file,$arrdata);
			    	 return $kq;
			    }else{
			    	return 'Lỗi, không quét được data từ sitemap hoặc 3 giá trị loc,lastmod,priority trống';
			    }
			}else{
				return 'file site map không tồn tại'.$file;
			}        	
        }
	}
 ?>
