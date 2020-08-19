<?
	session_start();

	$lg1 = $_POST['lg1'];
	$lg2 = $_POST['lg2'];
	
	//echo "{$lg1}, {$lg2}";
	$userlogin = "admin";
	
	include "../../Connections/connect_mysql.php";
	
	$sql_login = " SELECT * FROM user_tb WHERE use_username ='{$lg1}' AND use_password ='{$lg2}' ";
	$result_login = mysql_query($sql_login) or die(mysql_error());
	if(mysql_num_rows($result_login)==0){
		
		echo "N";	
		
	}else{
		$record_login=mysql_fetch_array($result_login);
			$use_id_login = $record_login['use_id'];
			$use_nameth_login = $record_login['use_nameth'];
			$use_nameen_login = $record_login['use_nameen'];
			$use_level_login = $record_login['use_level'];
			
			$_SESSION['use_id'] = $use_id_login;
			$_SESSION['use_nameth'] = $use_nameth_login;
			$_SESSION['use_nameen'] = $use_nameen_login;
			$_SESSION['use_level'] = $use_level_login;
			
		echo "Y";	
			  
	}
	
	mysql_close($c);	
?>