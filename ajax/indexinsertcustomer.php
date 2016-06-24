<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/jquery-2.2.3.js"> </script>
<script src="js/jquery.validate.min.js"></script>
<script>
  $(document).ready(function() {
	  
	  $('#username').keyup(function() {	

			  if($("#username").val()=="")
			  {  
		       	  $("#thongbao").html(" "); 
				  return;
			  }
			  if($.trim($("#username").val())=="")
			  {
			      	  $("#thongbao").html("Username không hợp lệ"); 
					  return;
			  }
				 
			  $.ajax({
					 url:"server/checkUser.php",
					 type:"POST",
					 dataType:"text",
					 data:{
						     username:$('#username').val(),
						  },
					 success: function(kqcheck)
					       { 
						       if(parseInt(kqcheck)==1)
							   {  
							      $("#thongbao").html("Username đã tồn tại").css("color","red");
							      return;
							   }
							   else //kqcheck==0
							   {
								   $("#thongbao").html("Username hợp lệ").css("color","blue");
							   }
						   }  
					 
					 });    
      });  
	
	//Su dung Jquery validate de bat loi
	 $("#finsert").validate({
                rules: {
                    username: "required",
                    password: "required",
                },
                messages: {
                    username: "Nhập họ tên người dùng",
                    password: "Nhập password",
                }
            });

    // Button tren form chuyen thanh button submit, va goi ajax khi co' su kien submit form
    $("#finsert").submit(function()
    {
    	//Nếu form vẫn bị dính lỗi thì hàm validator.form() trả giá trị false
    	//Nếu validator.form() trả về false sẽ không chạy ajax ( return) 
        var validator = $("#finsert").validate();
     	if(!validator.form()) return;

		    var customer = new Object();
			customer.username =$("#username").val();
			customer.password=$("#password").val();
			customer.fullname=$("#fullname").val();
			customer.mobile=$("#fullname").val();
			customer.address=$("#address").val();	 
		
		//convert object to json string
		var json_cus = JSON.stringify(customer);
		
        $.ajax({
			    url:"server/insertcustomer.php",
				type:"POST",
				dataType:"text",
				data:
				    {
					  cus : json_cus ,
					},
				success: function(result)
					{ 
					    if(isNaN(result))//Nếu dữ liệu khác số 
							alert(result); 
						else if(parseInt(result)==0)
						  		 alert("Thất bại");
							 else
							 {
						  		window.location.href = "indexselectcustomer.php";
							 }
					},
					error: function(){
						document.write("Thất bại");
					}
			});                  
    }); 
 });
</script>

</head>

<body>
<h3> Insert Customer </h3>
<form method="post" id="finsert">
Username <input type="text" id="username" name="username"/>  <span id="thongbao"></span> <br/>
Password <input type="password" id="password" name="password"/>  <br/>
Name <input type="text" id="fullname"/>      <br/>
Mobile <input type="text" id="mobile"/>      <br/>
Address<input type="text" id="address"/>     <br/>
<!--Type của button là "submit"-->
<input type="submit" value="Insert" id="ok" />
</form>
</body>

</html>

