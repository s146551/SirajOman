<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a new Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="page3.js"></script>
</head>

    <!-- This page is for a form to Add a New Location -->
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Siraj Oman</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="page1.php">Locations & Places</a></li>
            <li class="nav-item"><a class="nav-link" href="page2.php">Activities in Oman</a></li>
            <li class="nav-item"><a class="nav-link" href="page3.php">Add a Location</a></li>
            <li class="nav-item"><a class="nav-link" href="page4.php">Oman's Natural Wonders</a></li>
            <li class="nav-item"><a class="nav-link" href="page5.php">Your Opinion</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="toolsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tools & Fun
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="toolsDropdown">
                <li><a class="dropdown-item" href="questionnaire.php">Feedback Form</a></li>
                <li><a class="dropdown-item" href="calculator.php">Travel Calculator</a></li>
                <li><a class="dropdown-item" href="funpage.php">Oman Memory Game</a></li>
            </ul>
            </li>
        </ul>
        </div>
    </div>
    </nav>
  <div class="container mt-4">
    <div class="bg-light p-4 rounded shadow-sm">
    
        <h1 class="text-primary">Add a New Location</h1>
        <p class="text-secondary">Use this form to add a new tourist location to the list on the "Locations & Places" page.</p>

        <form action="page3.php" method="post" id="add_location_form" class="mt-4" onsubmit="return validateAddLocation()">

            <div class="mb-3">
                <label for="governorate" class="form-label">Governorate:</label>
                <input type="text" id="governorate" name="governorate" class="form-control" required>
                <span id="govError" class="text-danger small"></span>
            </div>
            
            <div class="mb-3">
                <label for="wilaya" class="form-label">Wilaya:</label>
                <input type="text" id="wilaya" name="wilaya" class="form-control">
                <span id="wilayaError" class="text-danger small"></span>
            </div>

            <div class="mb-3">
                <label for="attraction" class="form-label">Attraction:</label>
                <input type="text" id="attraction" name="attraction" class="form-control" required>
                <span id="attrError" class="text-danger small"></span>
            </div>

            <input type="submit" class="btn btn-primary w-100">

        </form>
    </div>
  </div>
    
  <footer class="bg-light text-center py-3 mt-4">
    <p class="mb-0">&copy; 2025 Siraj Oman | 
      <a href="index.php" class="text-primary">Home</a> | 
      <a href="contact.php" class="text-primary">Contact</a> | 
      <a href="about.php" class="text-primary">About</a>
    </p>
  </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>