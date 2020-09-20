document.addEventListener('DOMContentLoaded', (event) => {

  const hasMeprFormClass = document.querySelector('form.mepr-signup-form');

  if(hasMeprFormClass) {
    console.log('y');

    /**
     * Get the URL parameters
     */
    const getParams = function (url) {
      var params = {};
      var parser = document.createElement('a');
      parser.href = url;
      var query = parser.search.substring(1);
      var vars = query.split('&');
      for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
      }
      return params;
    };

    // Get parameters from the current URL
    const params = getParams(window.location.href);

    console.log(params['mepr-address-country']);
    console.log(countries);

    // Get country name from url param
    var countryName = params['mepr-address-country'];

    // iterate over each element in the array
    for (var i = 0; i < countries.length; i++){
      // look for the entry with a matching `name` value
      if (countries[i].name == countryName){
        console.log(countries[i].code);
        // select the country if there is a match
        document.getElementById('mepr-address-country1').value = countries[i].code;
      }
    }

    // for(var param in params) {
    //   let inputToFill = document.getElementsByName(param);
    //   if(inputToFill.length > 0) {
    //     console.log(param + ' - input exists');

    //   }
    // }

  }
});