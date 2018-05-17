<!-- Search Hotel -->
<div class="container my-3" ng-app>
    <div class="col-xs-12 col-sm-111 col-md-10 col-lg-8 col-center-block box">

        <form class="form-route" action="php/hotel.php" method="POST">
            <div class="box-center location-size">
                <div class="" style="width: 100%; height: 100%;">
                    <select class="combobox location-size search-text" id="to-location" name="to-location" ng-model="selectedCity">
                        <option class="lang" key="select"></option>
                        <option class="lang" key="stockholm" value="Stockholm"></option>
                        <option class="lang" key="falun" value="Falun"></option>
                        <option class="lang" key="are" value="Are"></option>
                    </select>
                </div>
            </div>

            <!-- Date Picker -->
            <div class="row">
                <div class="col-4">
                    <div class="lang" key="check-in"></div>
                    <div class="datehotel">
                        <input type="text" name="checkin" id="checkin" class="" placeholder=""/>
                    </div>
                </div>
                <div class="col-4">
                    <div class="lang" key="check-out"></div>
                    <div class="datehotel">
                        <input type="text" name="checkout" id="checkout" class="" placeholder=""/>
                    </div>
                </div>
               

                <script type="text/javascript">
                    var checkinDate, checkoutDate, selectedCity;
                    // When checkin box is clicked
                    $(function() {
                        $('input[name="checkin"]').daterangepicker({
                            opens: 'center',
                            drops: 'down',
                            autoUpdateInput: false,
                            autoApply: true,
                            minDate: moment(),
                        }, function(start, end) {
                            console.log("A new date selection was made: " + 
                            start.format('YYYY-MM-DD') + ' to ' + 
                            end.format('YYYY-MM-DD'));
                            var days = DateDiff(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                            console.log("nights: " + (days));
                            checkinDate = start.format('YYYY-MM-DD');
                            checkoutDate = end.format('YYYY-MM-DD');

                            document.getElementById("date1").innerHTML = checkinDate;
                            document.getElementById("date2").innerHTML = checkoutDate;
                        });

                        $('input[name="checkin"]').on('show.daterangepicker', function(ev, picker) {
                            $(this).val("");
                            $('input[name="checkout"]').val("");
                        });
                        $('input[name="checkin"]').on('apply.daterangepicker', function(ev, picker) {
                            $(this).val(picker.startDate.format('YYYY-MM-DD'));
                        });
                        $('input[name="checkin"]').on('apply.daterangepicker', function(ev, picker) {
                            $('input[name="checkout"]').val(picker.endDate.format('YYYY-MM-DD'));
                        });

                       
                    });

                    // When checkout box is clicked
                    $(function() {
                        $('input[name="checkout"]').daterangepicker({
                            opens: 'center',
                            drops: 'down',
                            autoUpdateInput: false,
                            autoApply: true,
                            minDate: moment(),
                        }, function(start, end) {
                            console.log("A new date selection was made: " + 
                            start.format('YYYY-MM-DD') + ' to ' + 
                            end.format('YYYY-MM-DD'));
                            var days = DateDiff(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                            console.log("nights: " + (days));
                            checkinDate = start.format('YYYY-MM-DD');
                            checkoutDate = end.format('YYYY-MM-DD');

                            document.getElementById("date1").innerHTML = checkinDate;
                            document.getElementById("date2").innerHTML = checkoutDate;
                        });

                        $('input[name="checkout"]').on('show.daterangepicker', function(ev, picker) {
                            $('input[name="checkin"]').val("");
                            $(this).val("");
                        });
                        $('input[name="checkout"]').on('apply.daterangepicker', function(ev, picker) {
                            $('input[name="checkin"]').val(picker.startDate.format('YYYY-MM-DD'));
                        });
                        $('input[name="checkout"]').on('apply.daterangepicker', function(ev, picker) {
                            $(this).val(picker.endDate.format('YYYY-MM-DD'));
                        });

                        
                    });
                    function DateDiff(from, to) {     // from, to are format: 2018-01-01;
                        var dateTemp, dateFrom, dateTo, days;
                        dateTemp = from.split("-");
                        dateFrom = new Date(dateTemp[1] + '-' + dateTemp[2] + '-' + dateTemp[0]);    // Change to format: 12-18-2017
                        dateTemp = to.split("-");
                        dateTo = new Date(dateTemp[1] + '-' + dateTemp[2] + '-' + dateTemp[0]);
                        days = parseInt(Math.abs(dateFrom - dateTo) / 1000 / 60 / 60 / 24);    // Change milliseconds to days
                        return days;
                    }

                    function searchHotel() {
                        
                    }
                </script>

                <div class="col-4">
                    <div>{{selectedCity}}</div>
                    <div id="date1"></div>
                    <div id="date2"></div>
                    <button style="width:100%;" class="box-center search-button lang" key="search" type="submit"></button>
                    <a href="https://www.rome2rio.com/post/HotelRedirect.aspx?label=r2r_HomepageSearch&location=Stockholm%2C%20Sweden&checkin=14%20May%202018&checkout=16%20May%202018
" target="_blank">Click me</a>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- End of Search Form -->
