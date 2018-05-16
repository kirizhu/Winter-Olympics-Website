/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("example", require("./components/ExampleComponent.vue"));

new Vue({
  el: "#app",

  data: {
    items: [],
    currencies: [],
    fromInputResult: "",
    toInputResult: "",
    selected: ""
  },

  methods: {
    fetchData: function() {
      var self = this;

      var api = "https://free.rome2rio.com/api/1.4/json/Search?key=S2Q8spaR";

      var fromInput = fromInputResult.value;
      var toInput = selected.value;
      var fromCity = "&oName=" + fromInput; // Lägger in 'Från' staden i URLen
      var toCity = "&dName=" + toInput; // Lägger in 'Till' staden i URLen

      var url = api + fromCity + toCity; // Lägger ihop datan som användaren skrev in och visar ruterna mellan städerna

      $.get(url, function(data) {
        self.items = data;
      });
    },

    getCheapest: function(routes) {
      if (routes != undefined) {
        var orderedItems = routes.sort(function(a, b) {
          var indicativeItemsA = a.indicativePrices.sort(function(
            indicativePriceA,
            indicativePriceB
          ) {
            return indicativePriceA.priceLow - indicativePriceB.priceLow;
          });
          var indicativeItemsB = b.indicativePrices.sort(function(
            indicativePriceA,
            indicativePriceB
          ) {
            return indicativePriceA.priceLow - indicativePriceB.priceLow;
          });
          return indicativeItemsA[0].priceLow - indicativeItemsB[0].priceLow;
        });
        var newArray = [];
        newArray.push(orderedItems[0]);
        return newArray;
      }
    },

    getFastest: function(items) {
      return _.orderBy(items, "totalDuration", "asc");
    },

    getShortest: function(items) {
      return _.orderBy(items, "distance", "asc");
    },

    timeConvert: function(t) {
      // Metod för att visa hur många timmar och minuter det tar att resa
      var minutes = t % 60;
      var hours = (t - minutes) / 60;
      var result;

      if (hours == 0) {
        result = minutes + "min";
      } else {
        result = hours + "h " + minutes + "min";
      }

      return result;
    }
  }
});
