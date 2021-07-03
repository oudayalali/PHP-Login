<?php
session_start();
include_once('config.php');

if(!isset($_SESSION['userlogin']))
{
	header("Location: login.php");
}
	 if(isset($_GET['logout']))
	 {
	 		session_destroy();
	 		unset($_SESSION);
	 		header("Location: login.php");


	 }


			 $email= $_SESSION['email'];
			 $sql = "SELECT * FROM user WHERE email= '$email' LIMIT 1";
			 $stmtselect = $db->prepare($sql);
			 $result = $db->query($sql);


?>
 


<h1>WELCOME</h1>
<p>   <?php
     foreach ($result as $key) {
 	echo $key['fname'];

 }

?>
    </p>

<a href="index.php?logout=true">Logout</a>