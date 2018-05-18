
<!-- Result-->
<div class="container mb-3">
    <div class="box-temp" style="height: 500px;">

        <table class="table table-striped ">
            <thead>
                <tr id="table-head"></tr>
            </thead>

            <tbody>

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
            </tbody>

        </table>

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
            //Table head
            var text = "<th class='lang' key='sports'></th>";
            var i, j;
            for (i = 0; i < ((events.length) / 16); i++) {
                j = 16 * i;
                text += "<th>" + events[j].date.substring(3) + "</th>";
                console.log(i + ":" + events[j].date.substring(3));
            }
            console.log(text);
            document.getElementById("table-head").innerHTML = text;

            // Table Row 1
            var textRow1 = "<th scope='row' class='lang' key='"+ events[0].sport + "'></th>";
            var i1, j1;
            for (i1 = 0; i1 < ((events.length) / 16); i1++) {
                j1 = 16 * i1;
                textRow1 += "<th>" + events[j1].note + "</th>";
                console.log(i1 + ":" + events[j1].note);
            }
            console.log(textRow1);
            document.getElementById("table-row-1").innerHTML = textRow1;

        });
    </script>
</div>

