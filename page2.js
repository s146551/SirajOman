function Location(place, tourist_attractions, nature_activities) {
      this.place = place || '';
      this.tourist_attractions = tourist_attractions || '';
      this.nature_activities = nature_activities || '';
    }

    var locations = [
      new Location('Deserts','Sharqiyah Sands','Camping'),
      new Location('Deserts','Wahiba Sands','Camel rides'),

      new Location('Mountains','Jebel Shams','Camping'),
      new Location('Mountains','Jebel Akhdar','Hiking'),
      new Location('Mountains','Jabal Samhan','Photo shoot'),
      
      new Location('Wadis','Wadi Bani Khalid','Swimming'),
      new Location('Wadis','Wadi Shab','Hiking trails'),

      new Location('Beaches and Islands','Daymaniyat Islands',"Diving"),
      new Location('Beaches and Islands','Sawadi Beach','Marine life'),
      new Location('Beaches and Islands','Qurum Beach',"Swimming"),

    ];


    function getLocations(list) {
      if (typeof list === 'undefined') {
        list = locations;
      }

      var container = document.getElementById('locationsContainer');
      if (!container) {
        return;
      }
      container.innerHTML = '';


      var by_place = {};
      for (var i = 0; i < list.length; i++) {
        var loc = list[i];
        var key = loc.place || 'unknown';
        if (!by_place[key]) by_place[key] = [];
        by_place[key].push(loc);
      }

      
      var placeKeys = Object.keys(by_place);    // i got this method from https://www.w3schools.com/jsref/jsref_object_keys.asp
      for (var j = 0; j < placeKeys.length; j++) {
        var thePlace = placeKeys[j];
        var rows = by_place[thePlace];
        for (var r = 0; r < rows.length; r++) {
          var locItem = rows[r];

          var isLast = false;
          if (r === rows.length - 1) {
            isLast = true;
          }

          var place_col;
          if (r === 0) {
            place_col = '<div class="col-md-4 fw-bold">' + thePlace + '</div>';
          } else {
            place_col = '<div class="col-md-4"> </div>';
          }

          var tourist_attractions_text = '';
          if (locItem.tourist_attractions) {
            tourist_attractions_text = locItem.tourist_attractions;
          }
          var tourist_attractions_col = '<div class="col-md-4">' + tourist_attractions_text + '</div>';

          var nature_activities_text = '';
          if (locItem.nature_activities) {
            nature_activities_text = locItem.nature_activities;
          }
          var nature_activities_col = '<div class="col-md-4">' + nature_activities_text + '</div>';

          if(r == rows.length-1){
            var full_row = '<div class="row text-center mb-3 border-bottom">' + place_col + tourist_attractions_col + nature_activities_col + '</div>';
          }
          else{
            var full_row = '<div class="row text-center mb-3 ">' + place_col + tourist_attractions_col + nature_activities_col + '</div>';
          }

          container.insertAdjacentHTML('beforeend', full_row);
        }
      }
    }


    function addLocation() {
      var place_value = document.getElementById('placeInput');
      var tourist_attractions_value = document.getElementById('attractionInput');
      var nature_activities_value = document.getElementById('activitieInput');
      if (!place_value || !tourist_attractions_value || !nature_activities_value) {
        return;
      }

      var thePlace = place_value.value;
      var theTouristAttractions = tourist_attractions_value.value;
      var theNatureActivities = nature_activities_value.value;

      if (!thePlace) {
        alert('please enter a place');
        place_value.focus();
        return;
      }
      if (!theTouristAttractions) {
        alert('please enter a Tourist Attractions');
        tourist_attractions_value.focus();
        return;
      }
      if (!theNatureActivities) {
        alert('Please enter an Nature Activitie');
        nature_activities_value.focus();
        return;
      }

      locations.push(new Location(thePlace, theTouristAttractions, theNatureActivities));
      getLocations();
      var addValues = document.getElementById('addValues');
      if (addValues) {
        addValues.reset();
      }
      place_value.focus();
    }



    function searchLocations() {
      var input = document.getElementById('searchInput');
      var input_value = input.value;
      var term = input_value.trim().toLowerCase();
      if (!term) { 
        getLocations();
        return;
        }

      var filtered = [];
      for (var i = 0; i < locations.length; i++) {
        var loc = locations[i];

        var match = false;
        
        if (loc.place.toLowerCase().indexOf(term) !== -1){
          match = true;
        }

        if (loc.tourist_attractions.toLowerCase().indexOf(term) !== -1){
          match = true;
        }

        if (loc.nature_activities.toLowerCase().indexOf(term) !== -1) {
          match = true;
        }

        if (match) {
          filtered.push(loc);
        }
      }
      getLocations(filtered);
    }


    window.onload = function() {
      getLocations();

      var search_button = document.getElementById('searchBtn');
      var reset_button = document.getElementById('resetBtn');
      var searchInput = document.getElementById('searchInput');

      if (search_button) {
        search_button.onclick = function() { 
          searchLocations(); 
        };
      }

      if (reset_button) {
        reset_button.onclick = function() {
          if (searchInput) {
            searchInput.value = '';
          }
          getLocations();
        };
      }

      if (searchInput) {
        searchInput.onkeydown = function(element) {
          if (element.key === 'Enter') {
            if (element.preventDefault) {
              element.preventDefault();
            }
            searchLocations();
          }
        };
      }

      var add_ID = ['placeInput','attractionInput','activitieInput'];
      for (var j = 0; j < add_ID.length; j++) {
        var value = document.getElementById(add_ID[j]);
        if (!value) {
          continue;
        }
        value.onkeydown = function(element) {
          if (element.key === 'Enter') {
            if (element.preventDefault) {
              element.preventDefault();
            }
            addLocation();
          }
        };
      }
    };