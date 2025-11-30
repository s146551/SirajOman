/**
 * Constructor function for creating a Location object for nature activities.
 * @param {string} place - The general place or category (e.g., 'Deserts', 'Mountains').
 * @param {string} tourist_attractions - Specific tourist attractions in that place.
 * @param {string} nature_activities - Nature-related activities available.
 */
function Location(place, tourist_attractions, nature_activities) {
    this.place = place || '';
    this.tourist_attractions = tourist_attractions || '';
    this.nature_activities = nature_activities || '';
}

/**
 * An array containing predefined Location objects related to Oman's nature activities.
 * This serves as the initial dataset for the activities displayed on the page.
 */
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

/**
 * Displays a list of locations in the 'locationsContainer' div.
 * Locations are grouped by their general 'place' category.
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


    // Group locations by their 'place' category for display
    var by_place = {};
    for (var i = 0; i < list.length; i++) {
      var loc = list[i];
      var key = loc.place || 'unknown'; // Use 'unknown' if place is not provided
      if (!by_place[key]) by_place[key] = [];
      by_place[key].push(loc);
    }

    
    // Iterate through grouped places and their activities to create table rows
    var placeKeys = Object.keys(by_place);
    for (var j = 0; j < placeKeys.length; j++) {
      var thePlace = placeKeys[j];
      var rows = by_place[thePlace];
      for (var r = 0; r < rows.length; r++) {
          var locItem = rows[r];

          var place_col;
          if (r === 0) {
            // Display place name only for the first row of each group
            place_col = '<div class="col-md-4 fw-bold">' + thePlace + '</div>';
          } else {
            place_col = '<div class="col-md-4"> </div>'; // Empty column for subsequent rows in the same group
          }

          // Get tourist attractions text, default to empty string if not provided
          var tourist_attractions_text = locItem.tourist_attractions || '';
          var tourist_attractions_col = '<div class="col-md-4">' + tourist_attractions_text + '</div>';

          // Get nature activities text, default to empty string if not provided
          var nature_activities_text = locItem.nature_activities || '';
          var nature_activities_col = '<div class="col-md-4">' + nature_activities_text + '</div>';

          // Construct the full row HTML. Add a bottom border to the last row of each place group.
          var full_row;
          if(r === rows.length - 1){
            full_row = '<div class="row text-center mb-3 border-bottom">' + place_col + tourist_attractions_col + nature_activities_col + '</div>';
          }
          else{
            full_row = '<div class="row text-center mb-3 ">' + place_col + tourist_attractions_col + nature_activities_col + '</div>';
          }

          // Insert the new row into the container
          container.insertAdjacentHTML('beforeend', full_row);
      }
    }
}

/**
 * Adds a new location/activity to the 'locations' array based on user input from the form.
 * Validates the input fields before adding the new item and then refreshes the display.
 */
function addLocation() {
    // Get input elements
    var place_value = document.getElementById('placeInput');
    var tourist_attractions_value = document.getElementById('attractionInput');
    var nature_activities_value = document.getElementById('activitieInput');

    // Basic check to ensure all input elements exist
    if (!place_value || !tourist_attractions_value || !nature_activities_value) {
      console.error("Error: One or more input elements for adding a location not found.");
      return;
    }

    // Get trimmed values from inputs
    var thePlace = place_value.value.trim();
    var theTouristAttractions = tourist_attractions_value.value.trim();
    var theNatureActivities = nature_activities_value.value.trim();

    // Validate inputs
    if (!thePlace) {
      alert('Please enter a place.');
      place_value.focus();
      return;
    }
    if (!theTouristAttractions) {
      alert('Please enter tourist attractions.');
      tourist_attractions_value.focus();
      return;
    }
    if (!theNatureActivities) {
      alert('Please enter a nature activity.');
      nature_activities_value.focus();
      return;
    }

    // Add the new location/activity to the array
    locations.push(new Location(thePlace, theTouristAttractions, theNatureActivities));
    getLocations(); // Refresh the displayed list
    
    // Reset the form fields after successful submission
    var addValues = document.getElementById('addValues');
    if (addValues) {
      addValues.reset();
    }
    place_value.focus(); // Set focus back to the first input field
}

/**
 * Searches the 'locations' array based on a user-provided search term.
 * Filters the activities where the place, tourist attractions, or nature activities match the search term
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
      // Check if the search term is found in place, tourist attractions, or nature activities
      if (loc.place.toLowerCase().includes(term)){
        match = true;
      }
      if (loc.tourist_attractions.toLowerCase().includes(term)){
        match = true;
      }
      if (loc.nature_activities.toLowerCase().includes(term)) {
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
 * Initializes the display of activities and sets up event listeners for search and add functionalities.
 */
window.onload = function() {
    getLocations(); // Initial display of all activities

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
        getLocations(); // Reset display to all activities
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

    // Attach keydown event listener to add activity input fields for 'Enter' key
    var add_ID = ['placeInput','attractionInput','activitieInput'];
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