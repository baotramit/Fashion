<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<form method="post">
Username <input type="text" name="username"/> <br/>
Password <input type="password" name="password"/> <br/>
Role
<select name="role">
<option value="1">Cao nhất</option>
<option value="2">Cấp 2</option>
<option value="2">Cấp 3</option>
</select> <br/>

<input type="submit" name="OK" value="Insert"/>
</form>
<body>

<?php
  require("../connect.php");
?>

<?php
   if(isset($_POST["OK"]))
   {
	   $user = "";
	   $pass = "";
 	  if(empty($_POST["username"])||empty($_POST["password"])||empty($_POST["role"]))
	  {
		   echo "Bạn chưa nhập dữ liệu đầy đủ";
		   return;
	  }
	 
	  $user = $_POST["username"];		   
	  $pass = $_POST["password"];
	  $role = $_POST["role"];
	  
		 try
		 {
			 $sql = "Select * from admin where Username = '{$user}'";
			 $stmt = $conn->prepare($sql);
		     $stmt->execute();
             $result = $stmt->fetchAll(); 
			 if(count($result)>0)
			 {
				 echo "Username này đã tồn tại. Insert thất bại";
				 return;
			 } 
			 
			 $sql = "insert into admin values ('{$user}','{$pass}','{$role}')";
			 $stmt = $conn->prepare($sql);
			 $stmt->execute();	
			 echo "Insert thành công";
		 }
		 catch(PDOException $e){
				echo "Insert thất bại ".$e->getMessage();
		 }	
   }
?>


</body>
</html>
