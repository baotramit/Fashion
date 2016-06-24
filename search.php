<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Search</h1>
<form name="f1" method="GET" action="search.php">
Product Name <input type="text" name="NamePro" /> <br/>
Price <select name="slPrice">
		  <option value="0"></option>
		  <option value="10">10</option>
		  <option value="20">20</option>
		  <option value="30">30</option>
		  <option value="40">40</option>
		  <option value="50">50</option>
	  </select> <br/>
 <input type="submit" value="Search" name="OK"/>   
</form>
</body>
</html>
<?php  
     require("connect.php");
?>
<?php
if(isset($_GET["OK"]))
{
   $name = "";
   $price = 0; 
   $sql = "Select * from product";
  
   if(!empty($_GET["NamePro"])&&!empty($_GET["slPrice"]))
   {
	   $name = $_GET["NamePro"];  
	   $price = $_GET["slPrice"];
       $sql = $sql." where Name like '%{$name}%' and Price <= {$price}";
   }
   else if(!empty($_GET["NamePro"]))
   {
	   $name = $_GET["NamePro"];  
       $sql = $sql." where Name like '%{$name}%'";
   }
   else if(!empty($_GET["slPrice"]))
   {
	   $price = $_GET["slPrice"];
	   $sql = $sql." where Price <= {$price}";
   }
   
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();
   
   foreach($result as $items)
   {
	   echo $items['Name'].'<br/>';
	   echo $items['Price'].'<br/>';
	   echo $items['Image'].'<br/>';
   }
}
?>
