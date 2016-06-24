<?php
 require("../../connect.php");
?>

<?php
 $sql = "select * from Customer";
 $stmt = $conn->prepare($sql);
 $stmt->execute();
 $result =  $stmt->fetchAll();
 
 $json = array();
 foreach($result as $item)
 {
	 $json[] = array(	 
            	'username' => $item["Username"] ,
				'password' => $item["Password"] ,
				'name' => $item["Name"] ,
 	 			'mobile' => $item["Mobile"] ,
				'address' => $item["Address"]
			);
}

die (json_encode($json));
?>
