<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/jquery-2.2.3.js"></script>
<script>
   $(document).ready(function() {
	    
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
		$.ajax({
					url:"server/selectcusbyuser.php",
					type:"POST",
					dataType:"json",
					data:{  
							 user:username,
						 },
					success: function(obj)
					{
						   //console.log(obj);
						   $("#username").val(obj.username);
						   $("#password").val(obj.password);
						   $("#fullname").val(obj.name);
						   $("#mobile").val(obj.mobile);
						   $("#address").val(obj.address)					
					},
					error: function(obj)
					{  
						alert("load data thất bại");
					}			
		      });
			  
		
				  
		$("#ok").click(function(e) 
		{
			var customer = new Object();
			customer.username =$("#username").val();
			customer.password=$("#password").val();
			customer.fullname=$("#fullname").val();
			customer.mobile=$("#mobile").val();
			customer.address=$("#address").val();
			//chuyển object về chuỗi Json
		    var json_cus = JSON.stringify(customer);
			
			$.ajax({    url:"server/updatecustomer.php",
						type:"POST",
						data: { cus:json_cus },
						dataType:"text",
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
							alert("Update thất bại");
						}
				   });
        });	  
   });
</script>
</head>

<body>
<h3> Update Customer </h3>
<form method="post">
Username <input type="text" id="username" readonly/> <br/>
Password <input type="password" id="password" />  <br/>
Name <input type="text" id="fullname"/>      <br/>
Mobile <input type="text" id="mobile"/>      <br/>
Address<input type="text" id="address"/>     <br/>
<input type="button" value="Update" id="ok" />
</form>
</body>
</html>
