<!-- Search Hotel -->
<div class="container my-3" >
    <div class="col-xs-12 col-sm-111 col-md-10 col-lg-8 col-center-block box">

        <form class="form-route">
            <div class="box-center location-size">
                <div class="" style="width: 100%; height: 100%;">
                    <select class="combobox location-size search-text" id="city" name="to-location" ng-model="selectedCity">
                        <option class="lang" key="select"></option>
                        <option class="lang" key="stockholm" value="Stockholm"></option>
                        <option class="lang" key="falun" value="Falun"></option>
                        <option class="lang "key="are" value="Are"></option>
                    </select>
                </div>
            </div>

            <!-- Date Picker -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-line ">
                        <div class="input-text lang font-weight-bold" key="check-in"></div>
                        <div class="datehotel">
                            <input type="text" name="checkin" id="checkin" class="form-control" placeholder=""/>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-line ">
                        <div class="input-text lang font-weight-bold" key="check-out"></div>
                        <div class="datehotel">
                            <input type="text" name="checkout" id="checkout" class="form-control" placeholder=""/>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <!-- <div></div>
                    <div id="date1"></div>
                    <div id="date2"></div> -->
                
                    <button style="width:100%;" class="box-center search-button lang block" key="search" onclick="searchHotel()"></button>
                    
                    <!-- <button onclick="searchHotel()">click me</button> -->
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
                            start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                            var days = DateDiff(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
                            console.log("nights: " + (days));
                            checkinDate = start.format('YYYY-MM-DD');
                            checkoutDate = end.format('YYYY-MM-DD');

                            // document.getElementById("date1").innerHTML = checkinDate;
                            // document.getElementById("date2").innerHTML = checkoutDate;
                        });
                        datePicker();
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

                            // document.getElementById("date1").innerHTML = checkinDate;
                            // document.getElementById("date2").innerHTML = checkoutDate;
                        });
                        datePicker();
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

                    function datePicker(){
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
                    }

                    function searchHotel() {
                        var cityCode, language, currency, checkinYM, checkinD, checkoutYM, checkoutD;
                        selectedCity = document.getElementById("city").value;
                        console.log("selectedCity: " + selectedCity);

                        // Step 1: get cityCode;
                        if(selectedCity === "Stockholm") {
                            cityCode = 2524279;
                        } else if(selectedCity === "Falun") {
                            cityCode = 2478891;
                        } else if(selectedCity === "Are") {
                            cityCode = 2468311;
                        } else {
                            console.log("City is not selected");
                        };
                        console.log("selectedCity: " + cityCode);
                        // Step 2: get language;
                        language = localStorage.getItem('myLang') || 'en';
                        console.log("language: " + language);
                        // Step 3: get currency;
                        if (language === "sv") {
                            currency = "SEK";
                        } else if (language === "ch") {
                            currency = "CNY";
                        } else {
                            currency = "USD";
                        };
                        console.log("currency: " + currency);
                        // Step 4: get Check in/out info
                        // YYYY-MM-DD;
                        checkinYM = checkinDate.substr(0, 7); //from 0st, cut 7 letters
                        checkinD = checkinDate.substr(8, 2);
                        checkoutYM = checkoutDate.substr(0, 7); //same as above
                        checkoutD = checkoutDate.substr(8, 2);
                        console.log("checkin: " + checkinYM + "," + checkinD);
                        console.log("checkout: " + checkoutYM +  "," + checkoutD);

                        var linkAddress = "https://www.booking.com/searchresults.en.html?aid=388289&city=-" + cityCode + "&lang=" 
                        + language + "&selected_currency=" + currency + "&checkin_year_month=" + checkinYM 
                        + "&checkin_monthday=" + checkinD + "&checkout_year_month=" + checkoutYM + "&checkout_monthday="
                        + checkoutD + "&label=SESto201805021105156592fgd,SESto201805141453552059fdd,r2r_HomepageSearch,1d:2,201805141358";
                        
                        console.log(linkAddress);
                        // window.location.href = linkAddress;
                        //window.open(linkAddress, '_blank');
                        var win = window.open(linkAddress, '_blank');
                        win.focus();

                    }
                </script>

                
               
            </div>

        </form>
    </div>
</div>
<!-- End of Search Form -->
