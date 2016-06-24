<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<form action="uploadfile.php" method="post" enctype="multipart/form-data">
   Select file <input type="file" name="file"/> <br/>
   <input type="submit" value="Upload" name="ok" />
</form>

</body>
</html>
<?php
 
 if(isset($_POST["ok"]))
 {
	 if($_FILES["file"]["name"]!=NULL)
	 {
		 if($_FILES["file"]["type"] == "image/jpeg"
		  || $_FILES["file"]["type"] == "image/png"
		  || $_FILES["file"]["type"] == "image/gif")
		  {
			  if($_FILES["file"]["size"]<=1048576)
			  {
				 $path = "image/"; // tên thư mục lưu hình trên server
				 
				 $tmp_name = $_FILES["file"]["tmp_name"];
				 
				 $name = $_FILES["file"]["name"];
				 
				 move_uploaded_file($tmp_name,$path.$name);
				 
				 echo "Upload file thành công";
			  }
			  else
			  {
				  echo "Kích thước File không được lớn hơn 1MB";
			  }
		  }
		  else
		  {
			  echo "Kiểu file không hợp lệ.";
		  }	 
	 }
	 else
	 {
		 echo "Bạn chưa chọn file";
	 }
 }
?>
