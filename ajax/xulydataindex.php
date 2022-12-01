
<?php
include '../include.php';
//check if its an ajax request, exit if not
if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
{
    die();
}else{
}  
// select database name -> return table name
if (isset($_POST['fdatabasename'])&&!isset($_POST['ftablename'])) {
	$databasename = strtolower(trim($_POST['fdatabasename']));
	$databasename=filter_var($databasename, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	if ($databasename!="") {
		$arr_table=$classcsdl->layTenBangTheoDatabaseName($databasename);
		if (is_array($arr_table)) {
	        foreach ($arr_table as $key) {
	            $tablename=$key->getTableName();
	            echo '<option value="'.$tablename.'">'.$tablename.'</option>';
	        }
	    }else{
	        echo '<option></option>';
	    }
	}else{
		echo '0';
	}
}
// select table name -> return column name
if (isset($_POST['ftablename'])&&isset($_POST['fdatabasename'])) {
	$tablename = strtolower(trim($_POST['ftablename']));
	$tablename=filter_var($tablename, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$databasename = strtolower(trim($_POST['fdatabasename']));
	$databasename=filter_var($databasename, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 

	if ($tablename!=""&&$databasename!="") {
		$arr_column=$classcsdl->selectColumnNameinDatabaseAndTable($databasename,$tablename);
		if (is_array($arr_column)) {
	        foreach ($arr_column as $key) {
	            $columnname=$key->getColumnName();
	            echo '<option value="'.$columnname.'">'.$columnname.'</option>';
	        }
	    }else{
	        echo '<option></option>';
	    }
	}else{
		echo '0';
	}
}

// applied select dataa
if (isset($_POST['select'])&&isset($_POST['from'])&&isset($_POST['db'])) {
	$from = strtolower(trim($_POST['from']));
	$from=filter_var($from, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$select = strtolower(trim($_POST['select']));
	$select=filter_var($select, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$db = strtolower(trim($_POST['db']));
	$db=filter_var($db, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	if ($db!=''&&$from!=''&&$select!='') {
		$sql = 'select '.$select.' from `'.$db.'`.`'.$from.'`';
		$data = $classcsdl->runMysql($sql);
		if (is_array($data)) {
			$datasent = '';
			foreach ($data as $key =>$record) {
				$re='';$title='';
				foreach ($record as $keys => $datacell) {
					$re.= $datacell.'|';
					$title.=$keys.'@';
				}
				$datasent.=$re.'@';
			}

			echo $title.'^'.$datasent;
		}else{
			echo 'Error: runMysql() in classcsdl';
		}
		
	}else{
		echo 0;
	}
}
if (isset($_POST['c_db'])&&isset($_POST['c_tb'])&&isset($_POST['c_col'])&&isset($_POST['c_id'])&&isset($_POST['c_vl'])&&isset($_POST['c_idn'])) {
	$tb = strtolower(trim($_POST['c_tb']));
	$tb=filter_var($tb, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$cl = strtolower(trim($_POST['c_col']));
	$cl=filter_var($cl, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$db = strtolower(trim($_POST['c_db']));
	$db=filter_var($db, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$idn = strtolower(trim($_POST['c_idn']));
	$idn=filter_var($idn, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 
	$id = trim($_POST['c_id']);
	$vl = trim($_POST['c_vl']);
	if ($db!=''&&$tb!=''&&$cl!=''&&$id!=''&&$idn!='') {
		$kq = $classcsdl->update($db,$tb,$cl,$id,$idn,$vl);
		if ($kq) {
			if ($kq==1) {
				echo 'Đã lưu: '.$cl.':'.$id.'='.$vl;
			}else{
				echo 'Lỗi - '.$kq;
			}
		}
	}else{
		echo 'Lỗi: csdl, table, tên cột, tên id, id không được để trống';
	}
}
if (isset($_POST['q_db'])&&isset($_POST['q_tb'])&&isset($_POST['q_fun'])) {
	$db=strtolower(trim($_POST['q_db']));
	$tb=strtolower(trim($_POST['q_tb']));
	$function=strtolower(trim($_POST['q_fun']));
	if ($db!=""&$tb!=""&$function!="") {
		switch ($function) {
			case 'selectsao':
				$sql = 'select * from `'.$db.'`.`'.$tb.'` where 1';
				echo $sql;
				break;
			case 'select':
				$arr_columnname = $classcsdl->selectColumnNameinDatabaseAndTable($db,$tb);
				if (is_array($arr_columnname)) {
					$c = '';
					foreach ($arr_columnname as $key) {
						$a=$key->getColumnName();
						$c.='`'.$a.'`,';
					}
					$c = rtrim($c, ",");
					$sql = 'select '.$c.' from `'.$db.'`.`'.$tb.'` where 1';
				}else{
					echo 'Error get column name';
				}
				
				echo $sql;
				break;
			case 'insert':
				$arr_columnname = $classcsdl->selectColumnNameinDatabaseAndTable($db,$tb);
				if (is_array($arr_columnname)) {
					$c = '';
					foreach ($arr_columnname as $key) {
						$a=$key->getColumnName();
						$c.='`'.$a.'`,';
					}
					$c = rtrim($c, ",");
					$sql = 'INSERT INTO `'.$db.'`.`'.$tb.'`('.$c.') VALUES';
				}else{
					echo 'Error get column name';
				}
				
				echo $sql;
				break;
			case 'update':
				$arr_columnname = $classcsdl->selectColumnNameinDatabaseAndTable($db,$tb);
				if (is_array($arr_columnname)) {
					$c = '';
					foreach ($arr_columnname as $key) {
						$a=$key->getColumnName();
						$c.='`'.$a.'`="",';
					}
					$c = rtrim($c, ",");
					$sql = 'UPDATE `'.$db.'`.`'.$tb.'` SET '.$c.' WHERE 1';
				}else{
					echo 'Error get column name';
				}
				
				echo $sql;
				break;
			case 'delete':
				$sql = 'DELETE FROM `'.$db.'`.`'.$tb.'` WHERE 0';
				echo $sql;
				break;
			default:
				# code...
				break;
		}
	}else{
		echo 0;
	}
}
if (isset($_POST['q_run'])) {
	$query = $_POST['q_run'];
	$search_select = substr($query,0,6);

	if ($query!='') {
		if (strtolower($search_select)=='select') {
			$data = $classcsdl->runMysql($query);
			$datasent = '';
			if (is_array($data)) {
				foreach ($data as $key =>$record) {
					$re='';$title='';
					foreach ($record as $keys => $datacell) {
						$re.= $datacell.'|';
						$title.=$keys.'@';
					}
					$datasent.=$re.'@';
				}

				echo $title.'^'.$datasent;
			}else{
				echo 0;
			}
			
		}else{
			$result = $classcsdl->NapSQL($query);
			if ($result==1) {
				echo 1;
			}else{
				echo 2;
			}
		}		 
	}else{
		echo 'Lỗi: query không được để trống';
	}
}