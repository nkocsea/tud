<?php 
	class ClassConnect
	{	
		function Connect(){

		$servername = 'localhost';
 
		 // $username = 'root'; 
		$username = 'root';
 
		 // $password = '';
		 $password = '';
 
		 $dbname = 'tud_db';
		 
		 $con = mysqli_connect($servername,$username,$password,$dbname);
		 mysqli_set_charset($con, 'UTF8');
		if(!$con){
		 
		   die('Ket noi that bai:'.mysqli_connect_error());
		 
		}else{
		 
		    //echo"<script type='text/javascript'>alert('connected');</script>";

		    return $con;
		 
		}	
		}  
	}
 ?>
