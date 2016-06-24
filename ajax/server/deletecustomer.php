
<?php
   require("../../connect.php");
?>
<?php
   try
   {
	   if(isset($_POST['user']))
	   { 
		   $username = $_POST["user"];
		  		
		   $sql = "delete from customer where username='{$username}'";
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