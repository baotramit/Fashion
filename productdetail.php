<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
   require("connect.php");
?>

<?php
 if(!empty($_GET["idpro"]))
 {
   $sql = "Select * from Product where Id = ".$_GET["idpro"];
   $stmt =  $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetch();
 }
?>

<body>
<table width="286" height="209" border="1">
  <tbody>
    <tr>
      <td width="82"><?php echo $result["Name"];?></td>
      <td width="102" rowspan="3"><?php echo $result["Description"];?></td>
    </tr>
    <tr>
      <td><img src="image/<?php echo $result["Image"];?>" height="200px" width="150px"/> </td>
    </tr>
    <tr>
      <td><?php echo $result["Price"];?> VND</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
