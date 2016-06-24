<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/jquery-2.2.3.js"></script>
<script>
  function tinhtoan()
  {
	  $.ajax({
				  url:"server3.php",
				  type:"POST",
				  dataType:"text",
				  data:
					  {
						  number1:$("#number1").val(),
						  number2:$("#number2").val()
					  },
				  success: function(ketqua)
				  {
					   $("#result").html("Kết quả : " + ketqua);
				  }
		  });
		  
		   
  }
</script>
</head>

<body>
Số 1 <input type="text" id="number1"/> <br/>
Số 2 <input type="text" id="number2"/> <br/>
<input type="button" value="Cộng" onClick="tinhtoan()"/> <br/>
<div id="result"></div>
</body>
</html>