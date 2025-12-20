// This script validates the visitor questionnaire form to ensure all data is correctly entered before submission.

// validateForm()
// This function is called when the form is submitted.
// It checks various fields and displays error messages next to the invalid fields.
// It returns true if all input is valid, allowing the form to be submitted.
function validateForm() {
    var isValid = true;

    // Accessing form elements
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var dateInput = document.getElementById("visitDate");
    var firstTime = document.getElementsByName("firstTime");
    var purpose = document.getElementById("purpose");
    var likes = document.getElementsByName("likes");
    var comments = document.getElementById("comments");

    // Accessing error spans
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var dateError = document.getElementById("dateError");
    var firstTimeError = document.getElementById("firstTimeError");
    var purposeError = document.getElementById("purposeError");
    var likesError = document.getElementById("likesError");
    var commentsError = document.getElementById("commentsError");

    // Clear previous error messages
    nameError.innerText = "";
    emailError.innerText = "";
    dateError.innerText = "";
    firstTimeError.innerText = "";
    purposeError.innerText = "";
    likesError.innerText = "";
    commentsError.innerText = "";

    // 1) Name validation: a required field
    if (name.value.trim() === "") {
        nameError.innerText = "Please enter your name.";
        if(isValid) name.focus();
        isValid = false;
    }

    // 2) Email validation: Ensures the email is a valid Gmail address.
    if (email.value.search(/^[a-zA-Z0-9._%+-]+@gmail\.com$/) == -1) {
        emailError.innerText = "Email must be a valid Gmail address.";
        if(isValid) email.focus();
        isValid = false;
    }

    // 3) Date validation: Ensures the date of visit is not in the future.
    var today = new Date().toISOString().split("T")[0]; // Format: yyyy-mm-dd
    if (dateInput.value == "" || dateInput.value > today) {
        dateError.innerText = "Date of visit cannot be empty or in the future.";
        if(isValid) dateInput.focus();
        isValid = false;
    }

    // 4) Radio button validation: Ensures one option is selected.
    var firstTimeSelected = false;
    for (var i = 0; i < firstTime.length; i++) {
        if (firstTime[i].checked) {
            firstTimeSelected = true;
            break;
        }
    }
    if (!firstTimeSelected) {
        firstTimeError.innerText = "Please select whether this is your first visit.";
        if(isValid) document.getElementById('fy').focus();
        isValid = false;
    }

    // 5) Dropdown validation: Ensures a purpose of visit is selected.
    if (purpose.selectedIndex < 1 || purpose.value === "none") {   
        purposeError.innerText = "Please choose your purpose of visit.";
        if(isValid) purpose.focus();
        isValid = false;
    }

    // 6) Checkbox validation: Ensures at least one "enjoyed" item is selected.
    var checkedCount = 0; 
    for (var i = 0; i < likes.length; i++) { 
        if (likes[i].checked)
            checkedCount++;
    }
    if (checkedCount == 0) {
        likesError.innerText = "Please select at least one thing you enjoyed.";
        if(isValid) document.getElementById('like1').focus();
        isValid = false;
    }

    // 7) Comments validation: Ensures comments are at least 10 characters long.
    if (comments.value.trim().length < 10) {
        commentsError.innerText = "Comments must be at least 10 characters long.";
        if(isValid) comments.focus();
        isValid = false;
    }

    // If all validation checks pass, return true to allow form submission.
    return isValid;
}
