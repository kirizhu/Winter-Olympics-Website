<div class="footer fixed-bottom">
    <div class="container">
        <div class="row">
            <!-- copyright -->
            <div class="col-lg-3 col-md-3 col-sm-12 box-center copyright">
                <p class="lang" key="copyright"></p>
            </div>
            <!-- links -->
            <div class="col-lg-6 col-md-6 col-sm-12 box-center">
                <div class="btn-group">
                    <a class="btn foot-link lang" key="about" href="#"></a>
                    <div class="rightline"></div>
                    <a class="btn foot-link lang" key="contact" href="#"></a>
                    <div class="rightline"></div>
                    <a class="btn foot-link lang" key="feedback" href="#"></a>

                    <!-- <div class="rightline"></div>
                    <a id="lan-demo" class="btn foot-link"></a> -->

                </div>
            </div>
            <!-- multi-language -->
            <div class="col-lg-3 col-md-3 col-sm-12 copyright">
                <select id="language" onchange="setLanguage()" class="combobox box-center language" name="language">
                    <option value="sv">Svenska</option>
                    <option value="en">English</option>
                    <option value="ch">中文</option>
                </select>


                <script>
                    var arrLang;
                    var lan = localStorage.getItem('myLang') || 'en';
                    $("select#language").val(lan);

                    $.getJSON("json/lang.json", function(result){
                        arrLang = result;


                        // Set texts in different languages in placeholders
                        // console.log(eval("arrLang." + lan + ".fromLocation"));
                        if(document.getElementById('fromLocation') !== null){
                            document.getElementById('fromLocation').placeholder = eval("arrLang." + lan + ".fromLocation");
                        }
                        if(document.getElementById('checkin') !== null){
                            document.getElementById('checkin').placeholder = eval("arrLang." + lan + ".checkin");
                        }
                        if(document.getElementById('checkout') !== null){
                            document.getElementById('checkout').placeholder = eval("arrLang." + lan + ".checkout");
                        }

                        $('.lang').each(function(index, element){
                            $(this).text(arrLang[lan][$(this).attr('key')]);
                        });
                    });

                    function setLanguage() {
                        var langValue = document.getElementById("language").value;
                        localStorage.setItem('myLang', langValue);

                        if(document.getElementById('fromLocation') !== null){
                            document.getElementById('fromLocation').placeholder = eval("arrLang." + langValue + ".fromLocation");
                        }
                        if(document.getElementById('checkin') !== null){
                            document.getElementById('checkin').placeholder = eval("arrLang." + langValue + ".checkin");
                        }
                        if(document.getElementById('checkout') !== null){
                            document.getElementById('checkout').placeholder = eval("arrLang." + langValue + ".checkout");
                        }

                        // loop language element to each items when clicked
                        $('.lang').each(function(index, element){
                            $(this).text(arrLang[langValue][$(this).attr('key')]);
                        });
                    };

                    function placeHolderLang(selectedLang) {
                        if(document.getElementById('fromLocation') !== null){
                            document.getElementById('fromLocation').placeholder = eval("arrLang." + selectedLang + ".fromLocation");
                        }
                        if(document.getElementById('checkin') !== null){
                            document.getElementById('checkin').placeholder = eval("arrLang." + selectedLang + ".checkin");
                        }
                        if(document.getElementById('checkout') !== null){
                            document.getElementById('checkout').placeholder = eval("arrLang." + selectedLang + ".checkout");
                        }
                    }



                    // On first load
                    $(function() {
                        switchSize();
                    });

                    // When browser resized
                    $(window).on('resize', function(){
                        switchSize();
                    });

                    function switchSize() {
                        if ($(this).width() < 768) { // on mobile
                            $('.footer').removeClass('fixed-bottom');
                            $('.input-line').addClass('row');
                            $('.input-text').addClass('col-4 text-left align-right mt-2');
                            $('.datehotel').addClass('col-8');
                        }
                    }


                </script>


            </div>
        </div>
    </div>
</div>


</body>
</html>
