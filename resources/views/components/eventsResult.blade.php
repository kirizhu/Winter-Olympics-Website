
<!-- Result-->
<div class="container mb-3">
    <div class="col-12 box-temp" style="height: 500px;">



    </div>

    <script>
        var events;
        console.log("events before:" + events);
        $.getJSON("json/events.json", function(data){
            events = data;
            console.log("events:" + events);
            console.log("events:" + events.id);

            //$('.lang').each(function(index, element){
            //    $(this).text(arrLang[lan][$(this).attr('key')]);
            //});
        });
    </script>
</div>

