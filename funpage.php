<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Fun Page – Memory Game</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">
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

<div class="container mt-5">
  <div class="text-center">
    <h1 class="mb-2">Oman Landmarks Memory Game</h1>
    <p class="text-muted">Click a card to flip it over. Match all the pairs to win!</p>
  </div>
  
  <div id="game-info" class="text-center mb-4 bg-white p-3 rounded shadow-sm">
    <span class="h5 me-4">Moves: <span id="moves" class="fw-bold text-primary">0</span></span>
    <span class="h5">Matches: <span id="matches" class="fw-bold text-success">0</span>/8</span>
  </div>

  <div id="game-board" class="row g-3 justify-content-center">
    <!-- Cards will be dynamically generated here -->
  </div>

  <div class="text-center mt-4">
    <button id="resetBtn" class="btn btn-outline-secondary">Restart Game</button>
  </div>
</div>

<!-- Win Modal -->
<div class="modal fade" id="winModal" tabindex="-1" aria-labelledby="winModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="winModalLabel">Congratulations!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <p class="h4">You've matched all the pairs!</p>
        <p>You are a true Oman expert!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="playAgainBtn" class="btn btn-primary">Play Again</button>
      </div>
    </div>
  </div>
</div>

<footer class="bg-light text-center py-3 mt-4">
    <p class="mb-0">&copy; 2025 Siraj Oman | 
      <a href="index.php" class="text-primary">Home</a> | 
      <a href="contact.php" class="text-primary">Contact</a> | 
      <a href="about.php" class="text-primary">About</a>
    </p>
</footer>

<!-- Bootstrap JS (for navbar toggle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="funpage.js"></script>

</body>
</html>