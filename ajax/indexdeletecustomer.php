<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/jquery-2.2.3.js"></script>
<script>  
 $(document).ready(function() {
	    var kq = confirm("Bạn thực sự muốn xóa");
		if(kq==false)
		{  window.location.href = "indexselectcustomer.php";	
		   return;
		}
		
		function GetURLParameter(sParam)
		{
			var sPageURL = window.location.search.substring(1);
			var sURLVariables = sPageURL.split('&');
			for (var i = 0; i < sURLVariables.length; i++)
			{
				var sParameterName = sURLVariables[i].split('=');
				if (sParameterName[0] == sParam)
				{
					return sParameterName[1];
				}
			}
  		}
		var username = GetURLParameter("user");
		alert(username);
     	$.ajax({	url:"server/deletecustomer.php",
					type:"POST",
					dataType:"text",
					data: { user:username, },
					success: function(result)
					{
						  if(isNaN(result))//Nếu dữ liệu khác số 
								alert(result); 
							else if(parseInt(result)==0)
						  		 	alert("Thất bại");
							 	 else
							 	 {
						  		 	alert("Thành công"); 
									 window.location.href = "indexselectcustomer.php";
							 	 }
					},
					error: function()
					{  
						alert("delete thất bại");
					}			
		      });
	});
</script>
</head>

<body>
</body>
</html>