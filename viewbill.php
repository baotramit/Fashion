<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
  require("connect.php");
  session_start();
?>

<?php
   $idcus = $_SESSION["sidcus"];
   $sql = "Select * from Bill where IdCus = {$idcus}";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();
   foreach($result as $item)
   {
	   $idBill = $item["Id"];
	   echo "<h3>Mã hóa đơn: " . $item["Id"];
	   
	   $date = new DateTime($item["Date"]);
	   echo " - Ngày đặt hàng: " . date_format($date,'d/m/Y');
	   
	  
	   
	   if($item["IdStatus"]==1)
	      echo "  - Tình trạng: Chưa xử lý </h3>" ;
	   else	  
	      echo "  - Tình trạng: Đã xử lý </h3>";
		  
	   //----------------------------------------//
	   
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
		 echo "<h4>Tổng tiền : " . $tongtien . "</h4>";
   }
?>
</body>
</html>
