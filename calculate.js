// calculateTotal()
// Called when the form is submitted.
// Reads input values, performs calculations, and displays the final total to the user.
function calculateTotal() {
    //  Get user inputs from the form using
    var locationPrice = document.getElementById("location").value;
    var visitors = document.getElementById("visitors").value;
    var transportCost = document.getElementById("transport").value;

    // Convert to numbers for calculations
    locationPrice = Number(locationPrice);
    visitors = Number(visitors);
    transportCost = Number(transportCost);

    //Basic validation for visitors input
    if (visitors <= 0) {
        alert("Number of visitors must be at least 1.");
        document.getElementById("visitors").focus();
        return false;
    }

    //Calculate base cost:
    // base = price per person × number of visitors
    var baseCost = locationPrice * visitors;

    //Add transport cost
    var total = baseCost + transportCost;

    //Add extra services cost (loop through checkboxes)
    // This demonstrates loops + logical operators
    var services = document.getElementsByName("services");
    var serviceTotal = 0;

    for (var i = 0; i < services.length; i++) {
        if (services[i].checked) {
            serviceTotal = serviceTotal + Number(services[i].value);
        }
    }

    total = total + serviceTotal;

    //Apply a simple discount rule:
    // If visitors >= 5 → give 5% discount
    if (visitors >= 5) {
        var discount = total * 0.05;
        total = total - discount;
    }

    //Display the final result
    var resultBox = document.getElementById("result");
    resultBox.style.display = "block";
    resultBox.innerHTML = "Total Trip Cost: " + total.toFixed(2) + " OMR";

    // Prevent actual form submission
    return false;
}
