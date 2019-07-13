<?php

session_start();
if(isset($_POST['do_login'])){

	$dsn = 'mysql:host=localhost;dbname=app';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
		);
	 try{
	 	$con = new PDO($dsn,$user,$pass,$option);
	 	//$con->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    // echo "you are connected";
	 }
	 catch(PDOException $e){
	 	echo "error in connection".$e->getMessage();
	 }

	// get data from user 
	 $email = $_POST['email'];
	 $pass  = $_POST['password'];
	//  echo  $email;
	//  echo  $pass;
	$stmt = $con->prepare("SELECT *  FROM user WHERE email = ? AND password = ? ");
	$stmt->execute(array($email,$pass));

	$user = $stmt->fetch();

	$count = $stmt->rowCount();

	if ($count > 0) {
		$_SESSION['email'] = $user['email'];
		$_SESSION['password'] = $user['password'];
		
		
	    echo "success";
	} else {
		echo "fail";
	}
	
 exit();



}
//=============================================
?>