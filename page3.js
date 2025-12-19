// This script validates the "Add a New Location" form to ensure all data is correctly entered before submission.
// It displays error messages near the respective fields instead of using alerts.

// validatePage3()
// This function is called when the form is submitted.
// It checks various fields like place name, description, activity types, governorate, and map link.
// It returns false if an error is found to stop submission and displays text in the error spans.
// It returns true if all input is valid.
function validatePage3() {

    // Accessing form elements using getElementById
    var placeName = document.getElementById("placeName");
    var description = document.getElementById("description");
    var governorate = document.getElementById("Governorate");
    var mapLink = document.getElementById("link");

    // Accessing error spans using getElementById
    var nameError = document.getElementById("nameError");
    var descriptionError = document.getElementById("descriptionError");
    var typeError = document.getElementById("typeError");
    var locationError = document.getElementById("locationError");

    // Clear previous error messages
    nameError.innerText = "";
    descriptionError.innerText = "";
    typeError.innerText = "";
    locationError.innerText = "";

    // 1) Required Field Check: Name
    if (placeName.value.trim().length < 3) {
        nameError.innerText = "The place name must be at least 3 characters long.";
        placeName.focus();
        placeName.select();
        return false;
    }

    // 2) Length Check: Description
    if (description.value.trim().length < 15) {
        descriptionError.innerText = "Please write a more detailed description (at least 15 characters).";
        description.focus();
        description.select();
        return false;
    }

    // 3) Checkbox validation: Activity/Site Type
    var types = document.getElementsByName("type");
    var checkedCount = 0;
    for (var i = 0; i < types.length; i++) {
        if (types[i].checked) {
            checkedCount++;
        }
    }

    if (checkedCount == 0) {
        typeError.innerText = "Please select at least one Activity / Site Type.";
        // Scroll to the activity section so the user sees the error
        document.getElementById("activity").scrollIntoView();
        return false;
    }

    // 4) Dropdown validation: Governorate
    if (governorate.selectedIndex < 1 || governorate.value == "none") {
        locationError.innerText = "Please select a Governorate.";
        governorate.focus();
        return false;
    }

    // 5) Regular Expression Validation: Map Link
    var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
    if (mapLink.value.search(urlPattern) == -1) {
        locationError.innerText = "Please enter a valid URL for the map location.";
        mapLink.focus();
        mapLink.select();
        return false;
    }

    // If all validation checks pass, return true to allow form submission.
    return true;
}