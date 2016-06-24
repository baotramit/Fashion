<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?php
   session_start();
   $user =  $_SESSION["sadmin"];
   $role =  $_SESSION["srole"];
   
   if($role!=1)
   {  
      $_SESSION["error"]="Bạn không có quyền truy cập vào trang này"; 
      header("Location:manage.php");	
   }
?>
</head>
<?php
   require("../connect.php");
?>
<body>
<H1>Quản lý Admin</H1>

<p>
<table border="1">
    <tr>
      <td>Username</td>
      <td>Password</td>
      <td>Role</td>
      <td>Action</td>
      <td>Action</td>
      <td>Action</td>
    </tr>
    
  <?php
   $sql = "Select * from admin where Username <> '{$user}'";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();
   foreach($result as $item)
   {
	   echo "<tr>";
	   echo "<td>".$item["Username"]."</td>";
	   echo "<td>".$item["Password"]."</td>";
	   echo "<td>".$item["Role"]."</td>";
	   
	   $user = $item["Username"];
       echo "<td> <a href='admin.php?user={$user}' onclick='return check();'>Delete</a></td>";
	   echo "<td> <a href='admininsert.php'>Insert</a></td>" ;
	   echo "<td> <a href='adminupdate.php?user={$user}'>Update</a></td>";

	   echo "</tr>";
   }  
?>
</table>

<script>
   function check()
   {
	   return confirm("Bạn thực sự muốn xóa");
   }
</script>

<?php
  if(!empty($_GET["user"]))
  {
	    $user = $_GET["user"];
	    $sql = "Delete from admin where Username = '{$user}'";
   		$stmt = $conn->prepare($sql);
   		$stmt->execute();
		header("Location:admin.php");
  }
?>

</body>
</html>
