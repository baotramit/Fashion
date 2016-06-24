<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
  require("../connect.php");
  session_start();
?>
<?php
       if(!empty($_GET["idBill"]))
	   {
		 $idBill =  $_GET["idBill"];  
		 $sql2 = "Select * from DetailBill,Product where IdBill = {$idBill} and DetailBill.IdPro = Product.Id";
   		 $stmt2 = $conn->prepare($sql2);
   		 $stmt2->execute();
   		 $result2 = $stmt2->fetchAll();
		
		 echo "<table border='1'>";
		 echo "<tr>";
		 echo "<td>Tên sản phẩm</td>";
		 echo "<td>Số lượng</td>";
		 echo "<td>Đơn giá</td>";
		 echo "</tr>";
		 $tongtien = 0;
		 foreach($result2 as $item2)
  		 {
			 $tongtien = $tongtien + ( $item2["Quantity"] * $item2["Price"]);
			 echo "<tr>";
			 echo "<td>".$item2["Name"]."</td>";
 			 echo "<td>".$item2["Quantity"]."</td>";
			 echo "<td>".$item2["Price"]."</td>";
			 echo "</tr>";
		 }
		 echo "</table>";
		 echo "Tổng tiền : ".$tongtien;
	   }	   
?>
<?php
    $status1 = "";
	$status2 = "";
    if(!empty($_GET["idStatus"]))
	{
		$idstatus = $_GET["idStatus"];
		if($idstatus==1)
		    $status1 = "checked";
		else
		   	$status2 = "checked";
	}
?>

<form method="post">
   Tình trạng:  <input type="radio" name="status" value="1" <?php echo $status1 ?> /> Chưa xử lý 
   				<input type="radio" name="status" value="2" <?php echo $status2 ?> /> Đã xử lý 
                <br/>
                <input type="submit" name="update" value="Cập nhật trạng thái" />
                
</form>

<?php
   if(isset($_POST["update"]))
   {       
	   if($_POST["status"]==1)
          	$sql3 = "update Bill set idStatus = 1 where id = {$idBill}";      
	   else
          	$sql3 = "update Bill set idStatus = 2 where id = {$idBill}";      
		 
	   $stmt3 = $conn->prepare($sql3);
   	   $stmt3->execute();
	   header("Location:cart.php");	
	   
   }
?>

</body>
</html>