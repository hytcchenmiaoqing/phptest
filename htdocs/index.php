<?php
	include_once "include/ez_sql_core.php";
	include_once "include/ez_sql_mysql.php";

	

	$userid = isset($_POST["userid"])?$_POST["userid"]:"" ;
	//echo $userid;
	$userpwd = isset($_POST["userpwd"])?$_POST["userpwd"]:"" ;
	//echo $userpwd;
	if($userid !=="" && $userpwd !== ""){
		$db = new ezSQL_mysql();
		$sql ="select * from userinfo where id='". $userid . "' and userpwd ='" .$userpwd."' ";
		$res = $db->get_row($sql);
		if( !$res){
			//echo "fail to login";
			header("location:login.php?error=wrongpwd");
			die();

		}else{
			$_SESSION["wodeid"]= $userid;
			$_SESSION["wodenicheng"]= $res->userNickname;
			//echo "success to login! welcome " .$res->userNickname;
		

		}

	$curid = isset($_SESSION["wodeid"])?$_SESSION["wodeid"]:"" ;
	$curnicheng = isset($_SESSION["wodenicheng"])?$_SESSION["wodenicheng"]:"" ;
	//echo $curnicheng;
	if($curid ==""){
		header("location:login.php?error=needlogin");
		die();
	}else{

		echo "welcome $curnicheng" ;
	}

	}

?>

<html>
<head>
	<title>we chat</title>
</head>
<body>

</body>
</html>