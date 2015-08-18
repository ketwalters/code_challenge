<!DOCTYPE html>
<html>
    <head>
        <title>MLB Scoreboard</title>
        <link href="./styles.css"rel="stylesheet" type="text/css">
        <script src="../js/jquery.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
        <style type="text/css">
            #datalist { 
                margin-right: auto; 
                margin-left: auto; 
                width:200px;
            }
            
            table {     
                border-collapse: collapse;
            } 

             td {
                color: red;
                height: 30px;
                width: 40px;
                padding: 7px;
                font-family: 'Coming Soon', cursive; 
            }

            table tr:nth-child(even) {
                border-bottom: 1px solid black;
            } 

            
            th {
                background-color: white;
            }

            h1 {
                font-family: 'Coming Soon', cursive;
                color: #000080;
                 
            }    
        </style>
    </head>
    <body style="height:330px; background:url(bball.jpg);">
        <h1>MLB Scoreboard</h1>
        <img class="active" src="../img/bball.jpg">
        <div id="datalist"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajax({
                    url: "mlb.json",
                    dataType: "text",
                    success: function(data) {
                        var table = '<table><thead><th></th><th></th><th></th></thead><tbody>';
                        var json = $.parseJSON(data);
                        $.each(json.sports, function(index, element) {
                            $.each(element.leagues, function(a, b) {
                                $.each(b.events, function(c, d) {
                                    $.each(d.competitions, function(e, f) {
                                        var me = this;
                                        $.each(f.competitors, function(g, h) {
                                            table += '<tr><td>' + h.team.name + '</td><td>' + h.score + '</td><td>' + me.status.detail + '</td></tr>';          
                                        });    
                                    });
                                });
                            });
                            table += '</tbody></table>';
                            document.getElementById("datalist").innerHTML = table;
                            var cells = $('table tr td');
                            for (var i = 0; i < cells.length; i += 6) {
                                cells[i + 5].remove();
                            }                     
                        });

                    }
                });

            });
        </script>
    </body>
</html>
