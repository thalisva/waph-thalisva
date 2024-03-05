<?php
    session_set_cookie_params(15*60, "/","thalisva.waph.io",TRUE,TRUE);
	session_start(); 
	if (isset($_POST["username"]) and isset($_POST["password"])){
	if (checklogin_mysql($_POST["username"],$_POST["password"])) {
			$_SESSION["authenticated"] = TRUE;
			$_SESSION["username"] = $_POST["username"];	
			$_SESSION["browser"] = $_SERVER['HTTP_USER_AGENT'];	
		}else{
			session_destroy();
			echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
			die();
        }
	}
	if (!isset($_SESSION["authenticated"]) or $_SESSION["authenticated"] != TRUE) {
		session_destroy();
		echo "<script>alert('You have not login. Please login first');</script>";
		header("Refresh:0; url=form.php");
		die();
	}
	if ($_SESSION['browser'] != $_SERVER['HTTP_USER_AGENT']){
		echo "<script>alert('Session hijacking is detected!');</script>";
		header("Refresh:0; url=form.php");
		die();
	}
  	function checklogin_mysql($username, $password) {
		$mysqli= new mysqli('localhost',
							'thalisva',
							'Pa$$w0rd',
							'waph');
		if ($mysqli->connect_errno){
			printf("DATABASE COONECTION FAILED: %s\n", $mysqli->connect_error);
			exit();
		} 
		  $prepared_sql ="SELECT * FROM users WHERE username= ? AND password = md5(?);";
		 $stmt = $mysqli->prepare($prepared_sql);
		 $stmt-> bind_param("ss",$username,$password);
		 $stmt->execute();
		  // echo "DEBUG>sql= $sql";
		  $result = $stmt->get_result();
		  if($result->num_rows ==1)
		  	return TRUE;
		  return FALSE;
  	}
?>

        <h2> Welcome <?php echo htmlentities($_SESSION['username']); ?> !</h2>
		<a href="logout.php">Logout</a>