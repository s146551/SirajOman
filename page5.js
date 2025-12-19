// --- Function 1: Validates the Suggestions Form ---
function validateSuggestions() {
    var name = document.getElementById("userName");
    var phone = document.getElementById("userPhone");
    var suggest = document.getElementById("userSuggestions");

    // Clear previous errors
    document.getElementById("nameError").innerText = "";
    document.getElementById("phoneError").innerText = "";
    document.getElementById("suggestError").innerText = "";

    // 1) Name validation: Min 3 characters
    if (name.value.trim().length < 3) {
        document.getElementById("nameError").innerText = "Please enter your full name (min 3 chars).";
        name.focus();
        return false;
    }

    // 2) Phone validation: Regex for Oman format (8 digits starting with 9 or 7)
    var phonePattern = /^[97]\d{7}$/;
    if (phone.value.search(phonePattern) == -1) {
        document.getElementById("phoneError").innerText = "Enter a valid Oman phone number (8 digits starting with 9 or 7).";
        phone.focus();
        return false;
    }

    // 3) Suggestions validation: Min 20 characters
    if (suggest.value.trim().length < 20) {
        document.getElementById("suggestError").innerText = "Your suggestion must be at least 20 characters long.";
        suggest.focus();
        return false;
    }

    return true;
}

// --- Function 2: Validates the Rating Form ---
function validateRating() {
    var feedback = document.getElementById("userFeedback");
    var rates = document.getElementsByName("rate");
    var rateError = document.getElementById("rateError");
    var feedbackError = document.getElementById("feedbackError");

    // Clear previous errors
    rateError.innerText = "";
    feedbackError.innerText = "";

    // 1) Radio validation: Ensures a star rating is picked
    var rateSelected = false;
    for (var i = 0; i < rates.length; i++) {
        if (rates[i].checked) {
            rateSelected = true;
            break;
        }
    }

    if (!rateSelected) {
        rateError.innerText = "Please select a star rating.";
        return false;
    }

    // 2) Feedback validation: Required field
    if (feedback.value.trim().length < 10) {
        feedbackError.innerText = "Please tell us what you like (at least 10 characters).";
        feedback.focus();
        return false;
    }

    return true;
}