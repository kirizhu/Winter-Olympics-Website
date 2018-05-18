
<!-- Result-->
<div class="container mb-3">
    <div class="col-12 box-temp" style="height: 500px;">


        <script>
            var events;
            console.log("events before:" + events);
            $.getJSON("json/events.json", function(data){
                events = data;
                //console.log("events:" + events);
                console.log("events:" + events[1].sport);
                console.log("events:" + events[1].city);

                //construct the dates array, and show as table;
                var text = "<th>sports</th>";
                var i, j;
                for (i = 0; i < ((events.length) / 16); i++) {
                    j = 16 * i;
                    text += "<th>" + events[j].date + "</th>";
                    console.log(i + ":" + events[j].date)
                }
                console.log(text);
                document.getElementById("table-head").innerHTML = text;

            });
        </script>

        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr id="table-head"></tr>
                    <tr id="table-row-1"></tr>
                    <tr id="table-row-2"></tr>
                    <tr id="table-row-3"></tr>
                    <tr id="table-row-4"></tr>
                    <tr id="table-row-5"></tr>
                    <tr id="table-row-6"></tr>
                    <tr id="table-row-7"></tr>
                    <tr id="table-row-8"></tr>
                    <tr id="table-row-9"></tr>
                    <tr id="table-row-10"></tr>
                    <tr id="table-row-11"></tr>
                    <tr id="table-row-12"></tr>
                    <tr id="table-row-13"></tr>
                    <tr id="table-row-14"></tr>
                    <tr id="table-row-15"></tr>
                    <tr id="table-row-16"></tr>
                </thead>


            </table>
        </div>
    </div>
</div>

