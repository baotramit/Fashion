<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="js/jquery-2.2.3.js"></script>
</head>
<script>
$(document).ready(function(e) {
       $('#ok').click(function() {
         var json = [
							{"GROUP_ID":"143",
							 "GROUP_TYPE":"2011 Season",
							 "EVENTS":[
										{"EVENT_ID":"374","SHORT_DESC":"Wake Forest"},
										{"EVENT_ID":"376","SHORT_DESC":"Yale"},
										{"EVENT_ID":"377","SHORT_DESC":"Michigan State"}
									  ]
							},
							{"GROUP_ID":"142",
							 "GROUP_TYPE":"2010 Season",
							 "EVENTS":[
										{"EVENT_ID":"370","SHORT_DESC":"Duke"},
										{"EVENT_ID":"371","SHORT_DESC":"Northwestern"},
										{"EVENT_ID":"372","SHORT_DESC":"Brown"}
									  ]
							}
					];
			
			$.each(json,function(key,obj)
			{
			     document.write("GROUP_ID:" +obj.GROUP_ID + "<br>");
				 document.write("GROUP_TYPE:" +obj.GROUP_TYPE + "<br>");
				 
				 $.each(obj.EVENTS,function(k,value)
				 {
				  document.write("EVENT_ID:" + value.EVENT_ID + " , SHORT_DESC:" + value.SHORT_DESC + "<br/>");
				 });
				
			});
		  
    });
});

</script>
<body>

<input type="button" id="ok" value="Get Json"/>

</body>
</html>