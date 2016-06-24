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
  if(!isset($_SESSION['cart']))
   {
	       echo "Giỏ hàng rỗng";
		   echo "<a href='product.php'>Tiếp tục chọn hàng</a>";
       	   return;
   }
   foreach($_SESSION['cart'] as $item=>$value)
   		{
				$arrayID[]=$item;				
		}
   $str = join(",",$arrayID);
?>

<?php
if(!empty($_GET['id']))
	{
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
		header("location:cart.php");
	}
?>
<?php
  if(isset($_POST["cancel"]))
     {
		  unset($_SESSION['cart']);
		  echo "Giỏ hàng rỗng";
		  echo "<a href='product.php'>Tiếp tục chọn hàng</a>";
       	  return;
	 } 
?>

<?php
  if(isset($_POST["buy"]))
   {
		 if(!empty($_SESSION["suser"]))
		 {
			 $idcus = $_SESSION["sidcus"];
			 $idstatus = 1;
   		     $sql = "insert into bill values(NULL,'{$idcus}',CURDATE(),'{$idstatus}')";
			 $stmt = $conn->prepare($sql);
			 $stmt->execute();
			 $idBill = $conn->lastInsertId();
			
			  $sql = "Select * from Product where Id in ($str)";  
			  $stmt = $conn->prepare($sql); 
	          $stmt->execute();
	          $result = $stmt->fetchAll();
	
			foreach($result as $item)
			{  
	    		
				$idpro = $item['Id'];
				$price = $item['Price'];
	    	    $qty = $_SESSION['cart'][$idpro];
			    $sql = "insert into detailbill values(NULL,'{$idBill}',{$idpro},{$qty},{$price})";
			 	$stmt = $conn->prepare($sql);
			 	$stmt->execute();
			}
				unset($_SESSION['cart']);
                echo "Mua hàng thành công";
				echo "<a href='result.php'>Về trang quản lý cá nhân</a>";
				return;
       	  	
			
		 }
		 else 	  
       	     header("location:login.php");
	} 
?>

<?php
  
?>
<form method="post">
<table width="602" border="1">
  <tbody>
    <tr>
      <td width="68">Thứ tự</td>
      <td width="132">Tên sản phẩm</td>
      <td width="95">Hình</td>
      <td width="72">Giá</td>
      <td width="111">Số lượng</td>
      <td width="84">Thành tiền</td>
    </tr>
<?php
   
    $sql = "Select * from Product where Id in ($str)";  
	$stmt = $conn->prepare($sql); 
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	$dem = 0;
	$total = 0;
	    
	foreach($result as $item)
	{  
	    $dem = $dem+1;
		
		$id = $item['Id'];
		$name = $item['Name'];
		$image = $item['Image'];
		$price = $item['Price'];
	    $qty = $_SESSION['cart'][$id];	 	 
	 	
		$money = $price * $qty;
        $total = $total + $money;
		 
	 	echo "<tr>";
        echo "<td>{$dem}</td>";
        echo "<td>{$name}</td>";
        echo "<td>{$image}</td>";
        echo "<td>{$price}</td>";
		echo "<td>{$qty}</td>";
        echo "<td>{$money}  | <a href='cart.php?id={$id}'>Xóa<a/> ";								        
		echo "</tr>";
		
	}
	
	
?>   
    <tr style="text-align:center;font-weight:bold">
      <td colspan="5">Tổng tiền</td>
      <td><?php echo $total;?></td>
    </tr>
  </tbody>
</table>
<a href="product.php">Tiếp tục chọn hàng</a>

<input type="submit" name="cancel" value="Hủy giỏ hàng"/>
<input type="submit" name="buy" value="Mua hàng"/>
</form>
</body>
</html>
