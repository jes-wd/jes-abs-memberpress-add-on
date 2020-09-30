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
    var passwordStrengthMsg = document.querySelector('.mp-password-strength-area span em');
    console.log(passwordStrengthMsg);

    function insertAfter(referenceNode, newNode) {
      referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
    }
    var passwordStrengthEl = document.querySelector('.mp-password-strength-area');
    var el = document.createElement("p");
    el.innerHTML = "Please use at least: 1 capitalized letter, 1 number and 1 symbol. Use at least 8 characters.";
    insertAfter(passwordStrengthEl, el);

    function textLength(value){
      var minLength = 8;
      if(value.length > minLength) return true;
      return false;
   }

    passInput = document.getElementById('mepr_user_password1');
    passInput.onblur = function(){ 
      this.
    };

  }
});