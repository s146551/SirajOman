// This script validates the "Add a New Location" form.
function validateAddLocation() {
    var isValid = true;

    // Accessing form elements
    var gov = document.getElementById("governorate");
    var attr = document.getElementById("attraction");

    // Accessing error spans
    var govError = document.getElementById("govError");
    var attrError = document.getElementById("attrError");

    // Clear previous error messages
    govError.innerText = "";
    attrError.innerText = "";

    // 1) Governorate validation: required, min 3 chars
    if (gov.value.trim().length < 3) {
        govError.innerText = "Governorate is required (min 3 characters).";
        if(isValid) gov.focus();
        isValid = false;
    }

    // 2) Attraction validation: required, min 3 chars
    if (attr.value.trim().length < 3) {
        attrError.innerText = "Attraction is required (min 3 characters).";
        if(isValid) attr.focus();
        isValid = false;
    }

    return isValid;
}