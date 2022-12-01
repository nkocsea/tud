<?php
session_start();
ob_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
$domain = 'http://'.$_SERVER['SERVER_NAME'];

 include "class/ClassConnect.php";
 include "class/ClassTongHop.php";
 include "class/ClassUser.php";
 include "class/ClassCSDL.php";
 
//nhớ mở mấy cái này ra
 $classconnect = new ClassConnect;
 $classtonghop = new ClassTongHop;
 $classuser = new ClassUser;
 $classcsdl = new ClassCSDL;
 ?>
 