<!doctype html>
<html lang="{{ app()->getLocale() }}" ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <title>Rome2Rio API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    
    </head>
    <body>
        <div id="app">
            <div class="container">
                    From: <input id="fromInputResult" v-model="fromInputResult">
                    <select id="selected" v-model="selected">
                        <option disabled value="">Till</option>
                        <option value="Stockholm">Stockholm</option>
                        <option value="Falun">Falun</option>
                        <option value="Åre">Åre</option>
                    </select>
                    <button id="submit" v-on:click="fetchData()">Submit</button>
                </div>
            <div class="container">
                <br>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Distance</th>
                            <th scope="col">Travel Time</th>
                            <th scope="col">Transfer Time</th>
                            <th scope="col">Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items.routes">
                            <td>@{{ item.name }}</td>
                            <td>@{{ item.indicativePrices[0].priceLow }} - @{{ item.indicativePrices[0].priceHigh }} @{{item.indicativePrices[0].currency}}</td>
                            <td>@{{ item.distance }} km</td>
                            <td>@{{ timeConvert(item.totalTransitDuration) }}</td>
                            <td v-if="item.totalTransferDuration == 0">No Transfer</td>
                            <td v-if="item.totalTransferDuration > 0">@{{ timeConvert(item.totalTransferDuration) }}</td>
                            <td>@{{ timeConvert(item.totalDuration) }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Distance</th>
                            <th scope="col">Travel Time</th>
                            <th scope="col">Transfer Time</th>
                            <th scope="col">Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="fast in getFastest(items.routes).slice(0, 1)">
                            <td>@{{ fast.name }}</td>
                            <td>@{{ fast.indicativePrices[0].priceLow }} - @{{ fast.indicativePrices[0].priceHigh }} @{{fast.indicativePrices[0].currency}}</td>
                            <td>@{{ fast.distance }} km</td>
                            <td>@{{ timeConvert(fast.totalTransitDuration) }}</td>
                            <td v-if="fast.totalTransferDuration == 0">No Transfer</td>
                            <td v-if="fast.totalTransferDuration > 0">@{{ timeConvert(fast.totalTransferDuration) }}</td>
                            <td class="table-primary">@{{ timeConvert(fast.totalDuration) }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Distance</th>
                            <th scope="col">Travel Time</th>
                            <th scope="col">Transfer Time</th>
                            <th scope="col">Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="short in getShortest(items.routes).slice(0, 1)">
                            <td>@{{ short.name }}</td>
                            <td>@{{ short.indicativePrices[0].priceLow }} - @{{ short.indicativePrices[0].priceHigh }} @{{short.indicativePrices[0].currency}}</td>
                            <td class="table-primary">@{{ short.distance }} km</td>
                            <td>@{{ timeConvert(short.totalTransitDuration) }}</td>
                            <td v-if="short.totalTransferDuration == 0">No Transfer</td>
                            <td v-if="short.totalTransferDuration > 0">@{{ timeConvert(short.totalTransferDuration) }}</td>
                            <td>@{{ timeConvert(short.totalDuration) }}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Distance</th>
                            <th scope="col">Travel Time</th>
                            <th scope="col">Transfer Time</th>
                            <th scope="col">Total Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cheap in getCheapest(items.routes)">
                            <td>@{{ cheap.name }}</td>
                            <td class="table-primary">@{{ cheap.indicativePrices[0].priceLow }} @{{cheap.indicativePrices[0].currency}}</td>
                            <td>@{{ cheap.distance }} km</td>
                            <td>@{{ timeConvert(cheap.totalTransitDuration) }}</td>
                            <td v-if="cheap.totalTransferDuration == 0">No Transfer</td>
                            <td v-if="cheap.totalTransferDuration > 0">@{{ timeConvert(cheap.totalTransferDuration) }}</td>
                            <td>@{{ timeConvert(cheap.totalDuration) }}</td>
                        </tr>
                    </tbody>
                </table>         
            </div>  <!-- END OF CONTAINER  -->
        </div> <!--  END OF APP DIV -->

    <script src="https://tosweden-hero.herokuapp.com/resources/assets/js/app.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>
</html>