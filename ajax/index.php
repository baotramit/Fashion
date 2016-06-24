<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
   function kiemtra()
   {
	   // Tạo 1 biến lưu trữ đối tượng XML HTTP
	   var xmlhttp;
	   //Tùy vào trình duyệt ta đang sử dụng, nên phải kiểm tra
	   
	   //Nếu trình duyệt IE7+, Firefox, Chrome, Opera, Safari
	   if(window.XMLHttpRequest)
	   		 xmlhttp = new XMLHttpRequest();
	   else
	   	     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	   
	   //Khởi tạo 1 hàm gửi Ajax
	   xmlhttp.onreadystatechange = function()
	   {
		   // Nếu đối tượng XML HTTP trả về 2 thông số bên dưới => thành công
		   if(xmlhttp.readyState==4&&xmlhttp.status==200)
		   {
			   
			    // nhận chuỗi lấy được
				var chuoi = xmlhttp.responseText;
				//alert(chuoi);
				// gán vào thẻ <div>
				document.getElementById("result").innerHTML = chuoi;			
		   }
	   };
	   // Khai bao phuong thức GET và url là server.php
	   xmlhttp.open("GET","server.php",true);
	   // Sau hàm send, thì function vừa tạo trên onreadystatechange sẽ được chạy
	   xmlhttp.send();
   }
</script>
</head>

<body>
<div id="result"> </div>
<input type="button" name="ok" value="Click me" onClick="kiemtra()"/>
</body>
</html>
