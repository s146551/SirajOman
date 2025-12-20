<?php
$pageTitle = "Fun Page – Memory Game";
include 'header.php';
?>

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

<script src="funpage.js"></script>
<?php include 'footer.php'; ?>