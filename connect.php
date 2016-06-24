<?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'fashion';
  
  try
  {
	  $conn = new PDO("mysql:host=".$servername.";dbname=".$database,$username,$password);
	  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	  
	  $conn->query('SET NAMES utf8');
	  
	  //echo "Kết nối thành công";	  
  }
  catch(PDOException $e)
  {
	  echo "Lỗi kết nối " . $e->getMessage();
  }  
?>



