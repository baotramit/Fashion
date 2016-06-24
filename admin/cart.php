<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<H1>Quản lý Shopping Cart</H1>
<?php
  require("../connect.php");
  session_start();
?>
<?php
   $sql = "Select Bill.*,Name from Bill,Customer where Bill.IdCus = Customer.Id order by Bill.Id desc ";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();
   
   echo "<table border='1'>";
   echo "<tr>";
   echo "<td>Mã Hóa Đơn</td>";
   echo "<td>Người đặt</td>";
   echo "<td>Ngày đặt</td>";
   echo "<td>Tình trạng</td>";
   echo "<td>Action</td>";
   echo "</tr>";
		 
   foreach($result as $item)
   {
	   echo "<tr>";
		   $idBill = $item["Id"];
		   $date = new DateTime($item["Date"]);
		   
		   echo "<td>".$idBill."</td>";
		   
		   echo "<td>".$item["Name"]."</td>";
		   		   
		   echo "<td>". date_format($date,'d/m/Y')."</td>";
			 
		   if($item["IdStatus"]==1)
			  echo "<td> Chưa xử lý </td>" ;
		   else	  
			  echo "<td> Đã xử lý </td>";
			  
		   echo  "<td><a href='cartdetail.php?idBill={$idBill}&&idStatus={$item['IdStatus']}'>Chi tiết hóa đơn</a></td>";
		echo "</tr>";
	}
    echo "</table>";
  
?>
</body>
</html>
