<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <script language="javascript" src="js/jquery-2.2.3.js"></script>
        
    </head>
 <body>     
 <p>
  <script>	
  /*{  	$(document).ready(function() 
		        	 
			$.ajax({
					 url:"server/selectcustomer.php",
					 type:"GET",
					 dataType:"json",
					 success: function(result)
					 	      {
								 $.each(result,function(key,obj)
								 {
									$.each(obj,function(k,value)
									 {
										 document.write(k + " : " + value + "<br/>");
									 });//end each obj
								 });//end each result
							  }//end success
			      }); //end ajax
        });//end ready
*/
  
		$(document).ready(function() 
		{          	
		  		 $.ajax({
							  url:"server/selectcustomer.php",
							  type:"POST",
							  dataType:"json",
							  success: function(result)
							  {
								 $.each(result,function(key,rowData)
								 {
									var row = $("<tr></tr>");//new a tag
									row.append($("<td></td>").text(rowData.username));
									row.append($("<td></td>").text(rowData.password));
									row.append($("<td></td>").text(rowData.name));
									row.append($("<td></td>").text(rowData.mobile));
									row.append($("<td></td>").text(rowData.address));	
						
						var linkupdate="<a href='indexupdatecustomer.php?user="+rowData.username+"'>Update</a>"
					    var linkdelete="<a href='indexdeletecustomer.php?user="+rowData.username+"'>Delete</a>"
						
									row.append($("<td>"+linkupdate+"</td>"));	
									row.append($("<td>"+linkdelete+"</td>"));	
									
									$("#customerTable").append(row); 
								 });//end each result
							  }//end success
						  });//end ajax
        });
  </script> 
   
<table id="customerTable" border="1">
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Action</th>
        <th>Action</th>
    </tr>
</table>

<a href='indexinsertcustomer.php'> Thêm mới customer</a>         

</body>

</html>