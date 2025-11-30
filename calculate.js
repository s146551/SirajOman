/**
 * Calculates the total cost of a trip.
 * This function is called when the form is submitted.
 * It reads input values, performs calculations (base cost, transport, services, discounts),
 * and displays the final total to the user.
 * @returns {boolean} - Returns false to prevent the default form submission.
 */
function calculateTotal() {
    // Get user inputs from the form elements
    var locationPrice = document.getElementById("location").value;
    var visitors = document.getElementById("visitors").value;
    var transportCost = document.getElementById("transport").value;

    // Convert input values to numbers for mathematical calculations
    locationPrice = Number(locationPrice);
    visitors = Number(visitors);
    transportCost = Number(transportCost);

    // Basic validation for the number of visitors input
    if (visitors <= 0) {
        alert("Number of visitors must be at least 1."); // Alert user for invalid input
        document.getElementById("visitors").focus(); // Set focus to the visitors input field
        return false; // Prevent form submission
    }

    // Calculate base cost: price per person multiplied by the number of visitors
    var baseCost = locationPrice * visitors;

    // Add transport cost to the base cost
    var total = baseCost + transportCost;

    // Calculate cost for extra services (loop through checkboxes)
    // This section demonstrates using loops and conditional logic.
    var services = document.getElementsByName("services");
    var serviceTotal = 0; // Initialize total cost for services

    // Iterate over each service checkbox
    for (var i = 0; i < services.length; i++) {
        // If a service is checked, add its value to the serviceTotal
        if (services[i].checked) {
            serviceTotal = serviceTotal + Number(services[i].value);
        }
    }

    // Add the total service cost to the overall trip total
    total = total + serviceTotal;

    // Apply a simple discount rule:
    // If the number of visitors is 5 or more, apply a 5% discount.
    if (visitors >= 5) {
        var discount = total * 0.05; // Calculate 5% discount
        total = total - discount; // Subtract discount from total
    }

    // Display the final calculated result to the user
    var resultBox = document.getElementById("result");
    resultBox.style.display = "block"; // Make the result box visible
    resultBox.innerHTML = "Total Trip Cost: " + total.toFixed(2) + " OMR"; // Format to 2 decimal places

    // Prevent the actual form from submitting and reloading the page
    return false;
}
