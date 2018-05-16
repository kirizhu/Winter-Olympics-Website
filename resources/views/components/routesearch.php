<!-- Search Form -->
<div class="container my-3">
    <div class="col-xs-12 col-sm-111 col-md-10 col-lg-8 col-center-block box">

        <!-- Data is send to "php/search.php" -->
        <form class="form-route" action="php/search.php" method="POST">
            <!-- From / To -->
            <div class="row">
                <div class="form-group box-center location-size col-lg-4">
                    <label class="sr-only lang" key="from" for="from-location"></label>
                    <input type="text" class="form-control search-text" id="fromLocation" placeholder="Anywhere..." name="fromLocation">
                </div>

                <!-- Hide this swap_horiz symbol under narrow screan, with JS -->
                <div class="box-center col-lg-1">
                    <i class="material-icons revers-button" onclick="fun-reverse()">swap_horiz</i>
                </div>

                <div class="form-group box-center location-size col-lg-4">
                    <div class="" style="width: 100%; height: 100%;">
                        <select class="combobox location-size search-text" id="to-location" name="to-location">
                            <option class="lang" key="select"></option>
                            <option class="lang" key="stockholm" value="Stockholm"></option>
                            <option class="lang" key="falun" value="Falun"></option>
                            <option class="lang" key="are" value="Are"></option>
                        </select>
                    </div>
                </div>

                <button class="box-center search-button col-lg-2 lang" key="search" type="submit"></button>
            </div>

        </form>
    </div>
</div>
<!-- End of Search Form -->
