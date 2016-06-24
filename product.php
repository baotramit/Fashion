<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
  require("connect.php");

?>

<?php
   $sql2 = "select * from catalog";
   $stmt2 = $conn->prepare($sql2);
   $stmt2->execute();
   $result2 = $stmt2->fetchAll();
   
   foreach($result2 as $item2)
   {   
      $id = $item2['Id'];
	  $name = $item2['Name'];
       echo "<a href=product.php?idcata={$id}>{$name}</a>" . " | ";
   }
 ?>
 
<a href="product.php"> Tất cả  </a>
<?php 

    if(empty($_GET["idcata"]))   
	{
		 $sql = "Select * from product ";
	}
	else
	{
		$idcata = $_GET["idcata"] ;	
		$sql = "Select * from Product where IdCata={$idcata}";
	}
  
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll();
   
   $sanphamtrang = 3;
 
   $sotrang = ceil(count($result)/$sanphamtrang);
?>

<?php
$page = 0;
 
if(!empty($_GET['page']))
    $page = $_GET['page'];

    $start = $page*$sanphamtrang;
	
    $sql = $sql." LIMIT {$start},{$sanphamtrang}";
	
	  $stmt = $conn->prepare($sql);
	  $stmt->execute();
	  $result = $stmt->fetchAll();
?>  

<table width="100%">
      <tr> 
          	<td>
 					<?php foreach($result as $item)
                       { 
                    ?>
                         <table width="25%" border="1" style="float:left">
                         <tr> <td> <?php echo $item["Name"];  ?> </td> </tr>
                         <tr> <td> 
                             <a href="productdetail.php?idpro=<?php echo $item["Id"]?>">
                         		  <img src="image/<?php echo $item["Image"];?>" height="200px" width="150px"/> 
                              </a>  
                         </td> </tr>
                         <tr> <td> <?php echo $item["Price"]; ?> VND</td> </tr>
                         
                         <tr> <td> 
                              <a href="addcart.php?idpro=<?php echo $item["Id"]?>">
                                 Thêm vào giỏ hàng
                             </a>
                         </td> </tr>
                         
                         </table>
                         
                    <?php } ?>         
  			</td>
      </tr>  
</table>    
 
            
<?php
 
 for($page = 0 ;$page<$sotrang;$page++)
 {   
 	 $number = $page + 1;
	 
	 $url = $_SERVER["PHP_SELF"];
	
	 if(empty($_GET["idcata"]))
	 	  echo "<a href={$url}?page={$page}>$number</a>";
	 else
		  echo "<a href={$url}?page={$page}&idcata={$idcata}>$number</a>"; 
	 
 }
?>

</body>
</body>

</html>
