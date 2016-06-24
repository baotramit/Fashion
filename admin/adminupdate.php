<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
  require("../connect.php");
?>
<?php
   if(!empty($_GET["user"]))
   {
	   $user= $_GET["user"];
	   
	   $sql = "Select * from admin where Username = '{$user}'";
	   $stmt = $conn->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch();    
	   
	   $pass = $result["Password"];
	   $role = $result["Role"];
	   
	   $chon1="";
  	   $chon2="";
	   $chon3="";
			   
	   if($role==1)
	      $chon1 = "selected";
       else if($role==2)	
	       $chon2 = "selected";  
	   else    
		   $chon3 = "selected";  
   } 
?>

<form method="post">
Username <input type="text" name="username" readonly value="<?php echo $user?>"/> <br/>
Password <input type="password" name="password" value="<?php echo $pass?>"/> <br/>
Role
<select name="role">
<option value="1" <?php echo $chon1 ?> >Cao nhất</option>
<option value="2" <?php echo $chon2 ?> >Cấp 2</option>
<option value="3" <?php echo $chon3 ?> >Cấp 3</option>
</select> <br/>

<input type="submit" name="OK" value="Update"/>
</form>

<body>

<?php

   if(isset($_POST["OK"]))
   {	  
	  $pass = "";
 	  if(empty($_POST["password"]))
	  {
		   echo "Bạn chưa nhập dữ liệu đầy đủ";
		   return;
	  }
	 
	  $pass = $_POST["password"];
	  $role = $_POST["role"];	  
  
		 try
		 {	 
			 $sql = "update admin set Password = '{$pass}', Role = {$role} where Username = '{$user}'";
			 $stmt = $conn->prepare($sql);
			 $stmt->execute();	
			 header("Location:admin.php");
		 }
		 catch(PDOException $e){
				echo "Update thất bại ".$e->getMessage();
		 }	
   }
?>	

</body>
</html>
