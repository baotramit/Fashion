<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
  require("connect.php");
?>

<form action="login.php" method="post">
Username: <input type="text" name="username" size="25" /><br />
Password: <input type="password" name="password" size="25" /><br />
<input type="submit" name="ok" value="Đăng nhập" />

<a href="register.php">Đăng ký</a>

</form>
<?php
   if(isset($_POST["ok"]))
   {
	   $user = "";
	   $pass = "";
 	  if(empty($_POST["username"]))
	  {
		   echo "Bạn chưa nhập username";
		   return;
	  }
	  else if(empty($_POST["password"]))
	  {		
	       	echo "Bạn chưa nhập password";
			return;
	  }
	  
	  $user = $_POST["username"];		   
	  $pass = $_POST["password"];
	 //echo ("Welcome ".$user."<br/>Your password: ".$pass);
	
	 try{
		 $sql = "Select * from customer where Username like '{$user}' ";
		 $stmt = $conn->prepare($sql);
		 $stmt->execute();	
		 $result = $stmt->fetch();
		
		  	if( $result["Password"]==$pass && $result["IsActive"]==1)
			{
				 session_start();
				 $_SESSION["suser"]=$user;
				 $_SESSION["sname"] =$result["Name"];
				 $_SESSION["sidcus"]=$result["Id"];
				 
				 header("Location:result.php");	
			}
			else
		   		 echo "Login thất bại";	
		}
		catch(PDOException $e){
			echo "Kết nối thất bại ".$e->getMessage();
	    }
	
   }
?>
<?php
 
?>
</body>
</html>