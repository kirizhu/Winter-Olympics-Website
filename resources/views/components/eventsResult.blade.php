
<!-- Result-->
<div class="container mb-3">
    <div class="col-12 box-temp" style="height: 500px;">



    </div>

    <script>
        var events;
        console.log("events before:" + events);
        $.getJSON("json/events.json", function(data){
            events = data;
            //console.log("events:" + events);
            console.log("events:" + events[1].sport);
            console.log("events:" + events[1].city);

            //construct the dates array, and show as table;
            var text = "";
            var i, j;
            for (i = 0; i < ((events.length) / 16); i++) {
                j = 16 * i;
                text += "<th>" + events[j].date + "</th>";
                console.log(i + ":" + events[j].date)
            }
            console.log(text);
            document.getElementById("table-head").innerHTML = eval(text);

            //$('.lang').each(function(index, element){
            //    $(this).text(arrLang[lan][$(this).attr('key')]);
            //});
        });
    </script>

        <table class="table table-striped">
            <thead>
              <tr>
                <th>sports</th>
                <span class="table-head"></span>
              </tr>
            </thead>


        </table>
</div>

