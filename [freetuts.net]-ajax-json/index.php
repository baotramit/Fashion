<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    </head>
    <body>
        <div id="result1">TEXT</div>
        <div id="result2">JSON</div>
        <div id="result3">XML</div>
        <br/>
        <input type="button" name="clickme" id="text-click" value="Get List By Text"/>
        <input type="button" name="clickme" id="json-click" value="Get List By Json"/>
        <input type="button" name="clickme" id="xml-click" value="Get List By XML"/>
        <script language="javascript">
            $('#json-click').click(function()
            {
                $.ajax({
                    url : 'json.php',
                    type : 'get',
                    dataType : 'json',
                    success : function (result){
                        
                        /*var html = '';
                        html += '<table border="1" cellspacing="0" cellpadding="10">';
                        html += '<tr>';
                           html += '<td>';
                                html += 'Username';
                                html += '</td>';
                                html += '<td>';
                                html += 'Email';
                           html += '</td>';
                        html += '<tr>';*/
                        
                        // Kết quả là một object json
                        // Nên ta sẽ loop result
                        $.each (result, function (key, item){
                            /*html +=  '<tr>';
                                html +=  '<td>';
                                    html +=  item['username'];
                                html +=  '</td>';
                                html +=  '<td>';
                                    html +=  item['mobile'];
                                html +=  '</td>';
                            html +=  '<tr>';*/
							document.write(item['username'] + " : " + item['mobile']);
                        });
                        
                       // html +=  '</table>';
                        
                        $('#result2').html(html);
                    }
                });
            });
        </script>
        
    </body>
</html>