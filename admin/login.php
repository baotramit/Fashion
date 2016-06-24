<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Login Admin</h1>

<?php
  require("../connect.php");
?>

<form action="login.php" method="post">
Username: <input type="text" name="username" size="25" /><br />
Password: <input type="password" name="password" size="25" /><br />
<input type="submit" name="ok" value="Đăng nhập" />
</form>

<?php
   if(isset($_POST["ok"]))
   {
	   $user = "";
	   $pass = "";
 	  if(empty($_POST["username"])||empty($_POST["password"]))
	  {
		   echo "Bạn chưa nhập dữ liệu đầy đủ";
		   return;
	  }
	 
	  $user = $_POST["username"];		   
	  $pass = $_POST["password"];
	
	 try{
		 $sql = "Select * from admin where Username like '{$user}' ";
		 $stmt = $conn->prepare($sql);
		 $stmt->execute();	
		 $result = $stmt->fetch();
		
		  	if( $result["Password"]==$pass )
			{
				 session_start();
				 $_SESSION["sadmin"]=$user;
				 $_SESSION["srole"] =$result["Role"];
				 
				 header("Location:manage.php");	
			}
			else
		   		 echo "Login thất bại";	
		}
		catch(PDOException $e){
			echo "Kết nối thất bại ".$e->getMessage();
	    }	
   }
?>
</body>
</html>