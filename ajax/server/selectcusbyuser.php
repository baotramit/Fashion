<?php
 require("../../connect.php");
?>

<?php
if(!empty($_POST["user"]))
{
	 $user = $_POST["user"];
	 $sql = "select * from Customer where Username like '{$user}'";
	 $stmt = $conn->prepare($sql);
	 $stmt->execute();
	 $result =  $stmt->fetch();
	
	 $json = array(	 
					'username' => $result["Username"] ,
					'password' => $result["Password"] ,
					'name' => $result["Name"] ,
					'mobile' => $result["Mobile"] ,
					'address' => $result["Address"]
				);
	echo (json_encode($json));
}
?>