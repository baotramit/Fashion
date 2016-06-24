
<?php
   require("../../connect.php");
?>
<?php
   try
   {
	   if(isset($_POST['cus']))
	   { 
		  $json = $_POST['cus'];
		  //chuyển chuỗi về object
		  $obj = json_decode($json);
	  
		  $username = $obj->username;
		  $password = $obj->password;
		  $fullname = $obj->fullname;
		  $mobile = $obj->mobile;
		  $address = $obj->address;
		
		   $sql = "update customer set password='{$password}',name='{$fullname}',mobile={$mobile},address='{$address}' where username='{$username}'";
		   $stmt = $conn->prepare($sql);
		   $kq = $stmt->execute();
	 
		   if($kq==true)
			  die (1);
		   else
			  die (0);
	   }
   }
   catch(PDOException $e)
   {
	   die ( $e->getMessage());
   }
?>