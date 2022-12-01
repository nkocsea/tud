<?php
session_start();
ob_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
$domain = 'http://'.$_SERVER['SERVER_NAME'];

 include "class/ClassConnect.php";
 include "class/ClassTheLoai.php";
 include "class/ClassChatLuongVideo.php";
 include "class/ClassFileVideo.php";
 include "class/ClassHashtag.php";
 include "class/ClassQuocGia.php";
 include "class/ClassVideo.php";
 include "class/ClassLoaiServerVideo.php";
 include "class/ClassSlider.php";
 include "class/ClassTongHop.php";
 include "class/ClassAdminMenuLeft.php";
 include "class/ClassUser.php";
 include "class/ClassCSDL.php";
 include "class/ClassFileTXT.php";
 include "class/ClassSitemap.php";
 include "class/ClassFilter.php";
 include "class/ClassFilter_2.php";
 include "class/ClassYeuCauPhim.php";
 include "class/ClassEmailAdmin.php";
 include "class/ClassNgonNguVideo.php";
 
//nhớ mở mấy cái này ra
 $classconnect = new ClassConnect;
 $classtheloai = new ClassTheLoai;
 $classchatluongvideo = new ClassChatLuongVideo;
 $classfilevideo = new ClassFileVideo;
 $classhashtag = new ClassHashtag;
 $classquocgia = new ClassQuocGia;
 $classvideo = new ClassVideo;
 $classloaiservervideo = new ClassLoaiServerVideo;
 $classslider = new ClassSlider;
 $classtonghop = new ClassTongHop;
 $classadminmenuleft = new ClassAdminMenuLeft;
 $classuser = new ClassUser;
 $classcsdl = new ClassCSDL;
 $classfiletxt = new ClassFileTXT;
 $classsitemap = new ClassSitemap;
 $classfilter = new ClassFilter;
 $classfilter2 = new ClassFilter_2;
 $classyeucauphim = new ClassYeuCauPhim;
 $classemailadmin = new ClassEmailAdmin;
 $classngonnguvideo = new ClassNgonNguVideo;
 ?>
 