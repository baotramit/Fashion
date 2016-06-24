<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/jquery-2.2.3.js"></script>
<script>
   $(document).ready(function() {
	   $("#ok").click(function() {
          var json = [
		               { "username": "John","password":"123"},
		  			   { "username": "Michael" ,"password":"345"}
					 ];          
		  /*$.each(json,function(key,obj)
		  {
			  document.write(obj.username + ":" + obj.password + "<br/>");
		  });*/
		  
		  $.each(json,function(key,obj)
		  {
			  $.each(obj,function(k,value){
				   document.writeln(k + ":" + value + "</br>");
			  });			  
		  });
		  
    });    
});
</script>	
	
	
	   
	   

	 

</head>

<body>
<input type="button" id="ok" value="Click me" />
</body>
</html>
