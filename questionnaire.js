// validateForm()
// This function is called when the form is submitted
// It returns false if an error is found (to stop submission)
// It returns true if all input is valid
function validateForm() {

    //Accessing elements using getElementById
    var email = document.getElementById("email");
    var dateInput = document.getElementById("visitDate");
    var purpose = document.getElementById("purpose");
    var comments = document.getElementById("comments");

    // 1) Email validation (Gmail only)
    // Check Gmail pattern using search()
    if (email.value.search(/^[a-zA-Z0-9._%+-]+@gmail\.com$/) == -1) {
        alert("Email must be a valid Gmail address."); // show error message to the user
        email.focus();     // put cursor inside
        email.select();    // highlight incorrect text
        return false;
    }

    // 2) DATE VALIDATION (cannot be future date)
    var today = new Date().toISOString().split("T")[0]; // yyyy-mm-dd
    if (dateInput.value == "" || dateInput.value > today) {
        alert("Date of visit cannot be in the future."); // show error message to the user
        dateInput.focus();
        return false;
    }

    // 3) DROPDOWN VALIDATION
    if (purpose.selectedIndex < 1) {   
        alert("Please choose your purpose of visit."); // show error message to the user
        purpose.focus();
        return false;
    }

    // 4) CHECKBOX VALIDATION
    var likes = document.getElementsByName("likes");
    var checkedCount = 0; // set the checked boxes equal to zero

    for (var i = 0; i < likes.length; i++) { // loop to count how many box are checked 
        if (likes[i].checked)
            checkedCount++;
    }

    // check if there at least one box checked 
    if (checkedCount == 0) {
        alert("Please select at least one thing you enjoyed."); // show error message to the user
        return false;
    }

    // 5) COMMENTS VALIDATION
    // must be at least 10 characters
    if (comments.value.length < 10) {
        alert("Comments must be at least 10 characters long.");
        comments.focus();
        comments.select();
        return false;
    }

    // If all checks pass return true
    return true;
}
