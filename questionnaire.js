// This script validates the visitor questionnaire form to ensure all data is correctly entered before submission.

// validateForm()
// This function is called when the form is submitted.
// It checks various fields like email, date, purpose of visit, liked items, and comments.
// It returns false if an error is found (to stop submission) and displays an alert to the user.
// It returns true if all input is valid, allowing the form to be submitted.
function validateForm() {

    // Accessing form elements using getElementById
    var email = document.getElementById("email");
    var dateInput = document.getElementById("visitDate");
    var purpose = document.getElementById("purpose");
    var comments = document.getElementById("comments");

    // 1) Email validation: Ensures the email is a valid Gmail address.
    // The search() method is used with a regular expression to check the pattern.
    if (email.value.search(/^[a-zA-Z0-9._%+-]+@gmail\.com$/) == -1) {
        alert("Email must be a valid Gmail address."); // Show an error message to the user.
        email.focus();     // Put the cursor inside the email field.
        email.select();    // Highlight the incorrect text.
        return false;
    }

    // 2) Date validation: Ensures the date of visit is not in the future.
    var today = new Date().toISOString().split("T")[0]; // Format: yyyy-mm-dd
    if (dateInput.value == "" || dateInput.value > today) {
        alert("Date of visit cannot be in the future."); // Show an error message.
        dateInput.focus();
        return false;
    }

    // 3) Dropdown validation: Ensures a purpose of visit is selected.
    if (purpose.selectedIndex < 1) {   
        alert("Please choose your purpose of visit."); // Show an error message.
        purpose.focus();
        return false;
    }

    // 4) Checkbox validation: Ensures at least one "enjoyed" item is selected.
    var likes = document.getElementsByName("likes");
    var checkedCount = 0; // Counter for checked boxes.

    // Loop through all checkboxes to count how many are checked.
    for (var i = 0; i < likes.length; i++) { 
        if (likes[i].checked)
            checkedCount++;
    }

    // Check if at least one box is checked.
    if (checkedCount == 0) {
        alert("Please select at least one thing you enjoyed."); // Show an error message.
        return false;
    }

    // 5) Comments validation: Ensures comments are at least 10 characters long.
    if (comments.value.length < 10) {
        alert("Comments must be at least 10 characters long.");
        comments.focus();
        comments.select();
        return false;
    }

    // If all validation checks pass, return true to allow form submission.
    return true;
}
