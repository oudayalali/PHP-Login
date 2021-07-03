<?php
session_start();

require_once('config.php');

$email= $_POST['email'];
$password= sha1($_POST['password']);

$sql = "SELECT * FROM user WHERE email= ? AND password = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$email, $password]);

if($result){
$user= $stmtselect->fetch(PDO::FETCH_ASSOC);


if ($stmtselect->rowCount() > 0){

	 $_SESSION['userlogin'] = $user;
	 $_SESSION['email'] = $email;
	 $_SESSION['password'] = $password;

       

	echo 'Successfully Logged In';

}else{

	echo $email . $password;
}

}else{
	echo 'failed to connect';
}

                                