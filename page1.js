function Location(governorate, wilaya, attraction) {
    this.governorate = governorate || '';
    this.wilaya = wilaya || '';
    this.attraction = attraction || '';
  }

  var locations = [
    new Location('Muscat','Matrah','Mutrah Souq'),
    new Location('Muscat','Bausher','Royal Opera House Muscat'),
    new Location('Muscat','Seeb','Sultan Qaboos Grand Mosque'),
    new Location('Muscat','','Al Alam Palace'),

    new Location('Al Batinah South','Barka','Sawadi Beach'),
    new Location('Al Batinah South','Rustaq','Barka Souq'),
    new Location('Al Batinah South','Al Musannah','Rustaq Fort'),
    new Location('Al Batinah South',"Wadi Al Ma'awil",'Falaj Al Muysar'),
    new Location('Al Batinah South','','Ayn Al Kasfah'),

    new Location('Al Dakhiliya','Nizwa','Wadi Tanuf'),
    new Location('Al Dakhiliya','Jabal Akhdar','Jabel Shams'),
    new Location('Al Dakhiliya','Izki','Al Hoota Cave'),
    new Location('Al Dakhiliya','Manah','Nizwa Fort'),
    new Location('Al Dakhiliya','','Oman Across Ages Museum'),

    new Location('Al Sharqiyah North','Dima Wa Tayeen',"A'Sharqiyah Sands"),
    new Location('Al Sharqiyah North','Al Mudhaibi','Wadi Dayqah'),
    new Location('Al Sharqiyah North','Ibra',"Wadi A'Tayyin"),
    new Location('Al Sharqiyah North','','Wadi Bani Khalid'),

    new Location('Dhofar','Salalah','Al Mughsayl Beach'),
    new Location('Dhofar','Taqah','Jabal Samhan'),
    new Location('Dhofar','Mirbat','Taqah Castle'),
    new Location('Dhofar','Thumrait','Sumhuram Old City'),
    new Location('Dhofar','','Wadi Darbat')
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


    var by_governorate = {};
    for (var i = 0; i < list.length; i++) {
      var loc = list[i];
      var key = loc.governorate || 'unknown';
      if (!by_governorate[key]) by_governorate[key] = [];
      by_governorate[key].push(loc);
    }

    
    var govKeys = Object.keys(by_governorate);    // i got this method from https://www.w3schools.com/jsref/jsref_object_keys.asp
    for (var j = 0; j < govKeys.length; j++) {
      var gov = govKeys[j];
      var rows = by_governorate[gov];
      for (var r = 0; r < rows.length; r++) {
        var locItem = rows[r];

        var isLast = false;
        if (r === rows.length - 1) {
          isLast = true;
        }

        var gov_col;
        if (r === 0) {
          gov_col = '<div class="col-md-4 fw-bold">' + gov + '</div>';
        } else {
          gov_col = '<div class="col-md-4"></div>';
        }

        var wilayaText = '';
        if (locItem.wilaya) {
          wilayaText = locItem.wilaya;
        }
        var wilaya_col = '<div class="col-md-4">' + wilayaText + '</div>';

        var attrText = '';
        if (locItem.attraction) {
          attrText = locItem.attraction;
        }
        var attr_col = '<div class="col-md-4">' + attrText + '</div>';

        if(r == rows.length-1){
          var full_row = '<div class="row text-center mb-3 border-bottom">' + gov_col + wilaya_col + attr_col + '</div>';
        }
        else{
          var full_row = '<div class="row text-center mb-3 ">' + gov_col + wilaya_col + attr_col + '</div>';
        }

        container.insertAdjacentHTML('beforeend', full_row);
      }
    }
  }


  function addLocation() {
    var gov_value = document.getElementById('govInput');
    var wilaya_value = document.getElementById('wilayaInput');
    var attr_value = document.getElementById('attrInput');
    if (!gov_value || !wilaya_value || !attr_value) {
      return;
    }

    var gov = gov_value.value;
    var wilaya = wilaya_value.value;
    var attr = attr_value.value;

    if (!gov) {
      alert('please enter a governorate');
      gov_value.focus();
      return;
    }
    if (!wilaya) {
      alert('please enter a wilaya');
      wilaya_value.focus();
      return;
    }
    if (!attr) {
      alert('Please enter an attraction');
      attr_value.focus();
      return;
    }

    locations.push(new Location(gov, wilaya, attr));
    getLocations();
    var addValues = document.getElementById('addValues');
    if (addValues) {
      addValues.reset();
    }
    gov_value.focus();
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
      
      if (loc.governorate.toLowerCase().indexOf(term) !== -1){
         match = true;
      }

      if (loc.wilaya.toLowerCase().indexOf(term) !== -1){
        match = true;
      }

      if (loc.attraction.toLowerCase().indexOf(term) !== -1) {
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

    var add_ID = ['govInput','wilayaInput','attrInput'];
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