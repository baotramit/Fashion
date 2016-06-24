<?php
  require("../../connect.php");
?>

<?php
if(!empty($_POST["username"]))
{
   $username = $_POST["username"];
   
   $sql = "select * from customer where Username like '{$username}'"; 
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();
   
   if(count($result)>0)
      die("1");// trung username
   else
      die("0");	 // username ko ton tai
}
?>

