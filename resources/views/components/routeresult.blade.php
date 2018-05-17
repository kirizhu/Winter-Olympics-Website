
<!-- Result-->
<!-- From/To info -->
<div class="container box-temp">
    <div class="row">
        <!-- From/To -->
        <div class="col-lg-2 col-md-3 col-sm-4 info-label">
            <span class="lang" key="from"></span>
            <span id="from-place"></span>
        </div>

        <div class="col-lg-2 col-md-3 col-sm-4 info-label">
            <span class="lang" key="to"></span>
            <span id="to-place"></span>
        </div>

        <!-- Print/Share -->
        <div class="col-lg-7 col-md-5" style="text-align: right">
            <button class="btn share-button" onclick="fun-print()">
                <i class="fa fa-print"></i> <span class="lang" key="print"></span></button>
            <button class="btn share-button" onclick="fun-share()">
                <i class="fa fa-share-alt"></i> <span class="lang" key="share"></span></button>

        </div>
    </div>
</div>

<!-- End of From/To info -->

<div class="container mb-3">
    <div class="row">
        <!-- Route List -->
        <div class="col-md-4 col-sm-12 box-temp" style="height: 500px;">
            <ul class="pl-1">
                <li class="route-list mt-3">
                    <i class="fa fa-object-ungroup"></i>
                    <!-- <i class="material-icons">linear_scale</i> -->
                    <span class="lang" key="shortest"></span>

                    <!-- if shortest time -->
                    <div>
                        <i class="fa fa-plane"></i>
                        <!-- additional route info -->
                    </div>
                    <!-- if cheapest -->
                    <div>
                        <i class="fa fa-train"></i>
                        <!-- additional route info -->
                    </div>
                    <!-- if least transfer -->
                    <div>
                        <i class="fa fa-bus"></i>
                        <!-- additional route info -->
                    </div>
                    <hr>
                </li>
                <li class="route-list">
                    <i class="fa fa-object-ungroup"></i>
                    <span class="lang" key="cheapest"></span>
                    <div>
                        <i class="fa fa-plane"></i>
                        <!-- additional route info -->
                    </div>
                    <hr>
                </li>

                <li class="route-list mb-3">
                    <i class="fa fa-object-ungroup"></i>
                    <span class="lang" key="least"></span>
                    <div>
                        <i class="fa fa-plane"></i>
                        <!-- additional route info -->
                    </div>
                </li>

            </ul>
        </div>
        <!-- End of Route List -->

        <!-- Map -->
        <div class="col-md-8 col-sm-12 box-temp" style="height: 500px;">

        </div>
        <!-- End of Map -->
    </div>
</div>

