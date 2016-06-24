<?php
   require("../../connect.php");
?>
<?php
 try
 {  if(isset($_POST['cus']))
    { 
      //nhận biến 'cus' từ client gửi lên
     $json = $_POST['cus'];
	 // biến 'cus' chứa chuỗi json ,nên thực hiện chuyển chuỗi về object
     $obj = json_decode($json);
  
      $username = $obj->username;
	  $password = $obj->password;
	  $fullname = $obj->password;
	  $mobile = $obj->mobile;
	  $address = $obj->address;
	  //  $username = 'c';
	  // $password = '1';
	  // $fullname = '1';
	  // $mobile = '1';
	  // $address = '1';
	
      $sql = "insert into customer values(NULL,'{$username}','{$password}','{$fullname}',{$mobile},'{$address}',0)";
       $stmt = $conn->prepare($sql);
       $kq = $stmt->execute();
 
	   if($kq==true)
		  echo (1);
	   else
		  echo (0);
   }
 }
 catch(PDOException $e)
 {
	   echo ($e->getMessage());
 }
?>

