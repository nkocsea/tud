
<?php
include '../include.php';
//check if its an ajax request, exit if not
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
{
    die();
}else{
}  
if (isset($_POST['femail'])) {
	$user = strtolower(trim($_POST['femail']));
	$user=filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	if ($user!="") {
		$kq=$classuser->ktTonTaiUserTheoEmail($user);
		if ($kq!=1) {
			echo 'Username không đúng';
		}else{
			
		}
	}else{
		echo 'Vui lòng nhập User';
	}
}
if (isset($_POST['femail'])&&isset($_POST['fpass'])) {
	$user = strtolower(trim($_POST['femail']));
	$user=filter_var($user, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$pass = $_POST['fpass']; 
    
    
    if ($user!=''&&$pass!='') {
    	$pass=md5($pass);
        $kq = $classuser->ktDangNhap($user,$pass); 
        if ($kq!=0 && is_array($kq)) {
            foreach ($kq as $key) {
	           	$id=$key->getID();
				$email=$key->getEmail();
				$pass=$key->getPassword();
				$name=$key->getName();
				$permision=$key->getRole();
				$status=$key->getStatus();
				$date=$key->getDate();
	            $_SESSION['id'] = $id;
	            $_SESSION['email'] = $email;
	            $_SESSION['permision'] = $permision;
	            $_SESSION['status'] = $status;
	            $_SESSION['date'] = $date;
	            echo '1';
        	}
        }else{
            echo '0';
        }
    }else{
        echo '2';
    }
}