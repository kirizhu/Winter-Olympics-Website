<!-- Search Form -->
<div class="container my-3">
    <div class="col-xs-12 col-md-10 col-lg-8 col-center-block box">

        <!-- Data is send to "php/search.php" -->
        <form class="form-route" action="***.php" method="POST">
            <div class="form-row">

                <!-- <div class="form-group box-center location-size col-10" >
                    <label class="sr-only lang" key="from" for="from-location"></label>
                    <input type="text" class="form-control search-text" id="fromLocation" placeholder="Anywhere..." name="fromLocation">
                </div>

                <div class="form-group col-2"> -->

                    <!-- <button class="box-center search-button lang" key="search" type="submit"></button> -->
                <!-- </div> -->

            </div>

             <div class="col">
            <form action="search.php" method="post">
                <div class="input-group">
                    <input type="text" class="form-control input-lg"
                           name="search" placeholder="Search" required>
                    <div class="input-group-btn">
                        <button class="btn btn-info" type="submit">
                            Search
                        </button>
                    </div>
                </div>
            </form>
            <small class="mt-0" style="font-size: 0.7rem; color: #aaaaaa; margin-left: 2%">
                <i>Try to type in Java, or 2014, or translated,
                    or whatever you are interested, and Press Enter</i>
            </small>
        </div>

        </form>
    </div>
</div>
<!-- End of Search Form -->
