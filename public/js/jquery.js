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
                $("td").each(function() {
                    var v = $(this).text();
                    v.length > 18 ? $(this).text(v.slice(0, 10)) : ''
                });                    
            });

        }
    });

});