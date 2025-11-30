/**
 * Constructor function for creating a Location object.
 * @param {string} governorate - The governorate where the location is situated.
 * @param {string} wilaya - The wilaya (district) within the governorate.
 * @param {string} attraction - The name of the tourist attraction.
 */
function Location(governorate, wilaya, attraction) {
    this.governorate = governorate || '';
    this.wilaya = wilaya || '';
    this.attraction = attraction || '';
}

/**
 * An array containing predefined Location objects.
 * This serves as the initial dataset for the locations displayed on the page.
 */
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

/**
 * Displays a list of locations in the 'locationsContainer' div.
 * Locations are grouped by governorate.
 * @param {Array<Location>} [list=locations] - The array of Location objects to display. Defaults to the global 'locations' array.
 */
function getLocations(list) {
    if (typeof list === 'undefined') {
      list = locations;
    }

    var container = document.getElementById('locationsContainer');
    if (!container) {
      console.error("Error: 'locationsContainer' element not found.");
      return;
    }
    container.innerHTML = ''; // Clear existing content


    // Group locations by governorate for display
    var by_governorate = {};
    for (var i = 0; i < list.length; i++) {
      var loc = list[i];
      var key = loc.governorate || 'unknown'; // Use 'unknown' if governorate is not provided
      if (!by_governorate[key]) by_governorate[key] = [];
      by_governorate[key].push(loc);
    }

    
    // Iterate through grouped governorates and their locations to create table rows
    var govKeys = Object.keys(by_governorate);    // i got this method from https://www.w3schools.com/jsref/jsref_object_keys.asp
    for (var j = 0; j < govKeys.length; j++) {
      var gov = govKeys[j];
      var rows = by_governorate[gov];
      for (var r = 0; r < rows.length; r++) {
        var locItem = rows[r];

        var gov_col;
        if (r === 0) {
          // Display governorate name only for the first row of each group
          gov_col = '<div class="col-md-4 fw-bold">' + gov + '</div>';
        } else {
          gov_col = '<div class="col-md-4"></div>'; // Empty column for subsequent rows in the same group
        }

        // Get wilaya text, default to empty string if not provided
        var wilayaText = locItem.wilaya || '';
        var wilaya_col = '<div class="col-md-4">' + wilayaText + '</div>';

        // Get attraction text, default to empty string if not provided
        var attrText = locItem.attraction || '';
        var attr_col = '<div class="col-md-4">' + attrText + '</div>';

        // Construct the full row HTML. Add a bottom border to the last row of each governorate group.
        var full_row;
        if(r === rows.length - 1){
          full_row = '<div class="row text-center mb-3 border-bottom">' + gov_col + wilaya_col + attr_col + '</div>';
        }
        else{
          full_row = '<div class="row text-center mb-3 ">' + gov_col + wilaya_col + attr_col + '</div>';
        }

        // Insert the new row into the container
        container.insertAdjacentHTML('beforeend', full_row);
      }
    }
}

/**
 * Adds a new location to the 'locations' array based on user input from the form.
 * Validates the input fields before adding the new location and then refreshes the display.
 */
function addLocation() {
    // Get input elements
    var gov_value = document.getElementById('govInput');
    var wilaya_value = document.getElementById('wilayaInput');
    var attr_value = document.getElementById('attrInput');

    // Basic check to ensure all input elements exist
    if (!gov_value || !wilaya_value || !attr_value) {
      console.error("Error: One or more input elements for adding a location not found.");
      return;
    }

    // Get trimmed values from inputs
    var gov = gov_value.value.trim();
    var wilaya = wilaya_value.value.trim();
    var attr = attr_value.value.trim();

    // Validate inputs
    if (!gov) {
      alert('Please enter a governorate.');
      gov_value.focus();
      return;
    }
    if (!wilaya) {
      alert('Please enter a wilaya.');
      wilaya_value.focus();
      return;
    }
    if (!attr) {
      alert('Please enter an attraction.');
      attr_value.focus();
      return;
    }

    // Add the new location to the array
    locations.push(new Location(gov, wilaya, attr));
    getLocations(); // Refresh the displayed list
    
    // Reset the form fields after successful submission
    var addValues = document.getElementById('addValues');
    if (addValues) {
      addValues.reset();
    }
    gov_value.focus(); // Set focus back to the first input field
}

/**
 * Searches the 'locations' array based on a user-provided search term.
 * Filters the locations where the governorate, wilaya, or attraction matches the search term
 * and then displays the filtered list.
 */
function searchLocations() {
    var input = document.getElementById('searchInput');
    var input_value = input.value;
    var term = input_value.trim().toLowerCase(); // Get search term and convert to lowercase for case-insensitive search
    
    // If search term is empty, display all locations
    if (!term) { 
      getLocations();
      return;
    }

    var filtered = [];
    // Iterate through all locations and check for a match
    for (var i = 0; i < locations.length; i++) {
      var loc = locations[i];

      var match = false;
      // Check if the search term is found in governorate, wilaya, or attraction
      if (loc.governorate.toLowerCase().includes(term)){
         match = true;
      }
      if (loc.wilaya.toLowerCase().includes(term)){
        match = true;
      }
      if (loc.attraction.toLowerCase().includes(term)) {
        match = true;
      }

      if (match) {
        filtered.push(loc); // Add matching locations to the filtered list
      }
    }
    getLocations(filtered); // Display the filtered locations
}

/**
 * Event listener for when the window finishes loading.
 * Initializes the display of locations and sets up event listeners for search and add functionalities.
 */
window.onload = function() {
    getLocations(); // Initial display of all locations

    var search_button = document.getElementById('searchBtn');
    var reset_button = document.getElementById('resetBtn');
    var searchInput = document.getElementById('searchInput');

    // Attach click event listener to the search button
    if (search_button) {
      search_button.onclick = function() { 
        searchLocations(); 
      };
    }

    // Attach click event listener to the reset button
    if (reset_button) {
      reset_button.onclick = function() {
        if (searchInput) {
          searchInput.value = ''; // Clear search input
        }
        getLocations(); // Reset display to all locations
      };
    }

    // Attach keydown event listener to the search input for 'Enter' key
    if (searchInput) {
      searchInput.onkeydown = function(event) {
        if (event.key === 'Enter') {
          if (event.preventDefault) {
            event.preventDefault(); // Prevent form submission if input is part of a form
          }
          searchLocations();
        }
      };
    }

    // Attach keydown event listener to add location input fields for 'Enter' key
    var add_ID = ['govInput','wilayaInput','attrInput'];
    for (var j = 0; j < add_ID.length; j++) {
      var value = document.getElementById(add_ID[j]);
      if (!value) {
        continue;
      }
      value.onkeydown = function(event) {
        if (event.key === 'Enter') {
          if (event.preventDefault) {
            event.preventDefault(); // Prevent form submission
          }
          addLocation();
        }
      };
    }
};