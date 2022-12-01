<?php 

	class ClassTongHop
	{

		public function curPageURL() {
			$pageURL = 'http';
			if ($_SERVER['HTTPS'] == 'on') {
			$pageURL .= 's';
			}
			$pageURL .= '://';
			if ($_SERVER['SERVER_PORT'] != '80') {
			$pageURL .= $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
			} else {
			$pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			}
			if (strpos($pageURL, '&') >=1) {
			  	$pageURL = substr($pageURL, 0,strpos($pageURL, '&')); //chỉ lấy đến id
			}			
			return $pageURL;
		}
		public function checkUrlImageDie($url) {
			if ($url != '') {
				$headers = @get_headers($url);
				if(strpos($headers[0],'404') === false)
				{
				  return $url;
				}else{
				  return "err image";
				}
			}else{
				return "image null";
			}			
		}
		public function vn_to_str ($str){ 
			$unicode = array(			 
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',			 
			'd'=>'đ',			 
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',			 
			'i'=>'í|ì|ỉ|ĩ|ị',			 
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',			 
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',			 
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',			 
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',			 
			'D'=>'Đ',			 
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',			 
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',			 
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',			 
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',			 
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			''=>':',			 
			);			 
			foreach($unicode as $nonUnicode=>$uni){			 
			$str = preg_replace("/($uni)/i", $nonUnicode, $str);			 
			}
			$str = trim($str,' ');
			$str = str_replace(' ','-',$str);
			$str = strtolower($str);		 
			return $str;			 
		}
		public function create_folder_poster_whith_id($id){
			$kytu = strlen($id);
			$kytu_0 = 10-$kytu;
			$_0="";
			for ($i=0; $i < $kytu_0; $i++) { 
				$_0.="0";
			}
			if ($kytu>0&&$kytu<=10) {
				if ($kytu<=2) {
					$thumuc = '0000000000-0000000099';
				}else{
					$a = substr($id,0,($kytu-2));
					$thumuc = $_0.$a."00-".$_0.$a."99";
				}
			}else{
				return false;
			}
			return "http://pphim.org/img/sv002/sv.002/".$thumuc."/";
		}
		public function taokey_bang_chu_cai_du_tien_trong_ten_phim($tenphim,$tenphim_en){
		    if ($tenphim!=""&&$tenphim_en!="") {
		        $tenphim = vn_to_str($tenphim);
		        $arrtenphim = explode(" ",$tenphim);
		        $arrtenphim_en = explode(" ",$tenphim_en);
		        $keyword="";
		        $keyword_en="";
		        foreach ($arrtenphim as $key) {
		            $keyword.= substr(trim($key),0,1);
		        }
		        $keyword_thuong=strtolower($keyword);
		        $keyword_hoa=strtoupper($keyword);
		        foreach ($arrtenphim_en as $key) {
		            $keyword_en.= substr(trim($key),0,1);
		        }
		        $tenphim_thuong=strtolower($tenphim);
		        $keyword_en_thuong=strtolower($keyword_en);
		        $keyword_en_hoa=strtoupper($keyword_en);
		        return $keyword_hoa.",".$keyword_thuong.",".$keyword_en_hoa.",".$keyword_en_thuong.",".$tenphim_thuong;
		    }else{
		        return 0;
		    }
		    
		}
	}
 ?>

