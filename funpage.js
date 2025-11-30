// Array of landmark identifiers (used for image filenames and matching)
const landmarks = [
  'nizwa-fort', 'mutrah-souq', 'grand-mosque', 'jebel-akhdar',
  'wahiba-sands', 'ras-al-jinz', 'al-alam-palace', 'wadi-shab'
];

// Game state variables
let flippedCards = [];      // Stores currently flipped cards
let matchedPairs = 0;       // Number of matched pairs
let moves = 0;              // Total moves made
let canFlip = true;         // Prevents flipping during animation
let winModal;               // Bootstrap Modal instance

// Initialize or reset the game
function initGame() {
  // Reset game state
  flippedCards = [];
  matchedPairs = 0;
  moves = 0;
  canFlip = true;
  if(winModal) winModal.hide();

  // Update UI counters
  document.getElementById('moves').textContent = moves;
  document.getElementById('matches').textContent = matchedPairs;

  // Create a shuffled deck with pairs
  let deck = [...landmarks, ...landmarks];
  for (let i = deck.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [deck[i], deck[j]] = [deck[j], deck[i]]; // Swap elements
  }

  // Clear game board
  const board = document.getElementById('game-board');
  board.innerHTML = '';

  // Dynamically create card elements
  deck.forEach(landmark => {
    const col = document.createElement('div');
    col.className = 'col-6 col-md-3';

    const card = document.createElement('div');
    card.className = 'card h-100 shadow-sm';
    card.dataset.landmark = landmark;
    card.style.cursor = 'pointer';

    const img = document.createElement('img');
    img.className = 'card-img-top img-fluid';
    img.src = `images/funpage/${landmark}.jpg`;
    img.alt = landmark;
    img.style.display = 'none';
    img.style.height = '150px'; /* Enforce consistent height */
    img.style.objectFit = 'cover'; /* Ensure images cover the area */

    const front = document.createElement('div');
    front.className = 'd-flex align-items-center justify-content-center bg-info text-white h-100';
    front.textContent = '?';
    front.style.fontSize = '3rem';
    front.style.height = '150px'; /* Enforce consistent height */


    card.appendChild(img);
    card.appendChild(front);
    col.appendChild(card);
    board.appendChild(col);

    card.addEventListener('click', flipCard);
  });
}

// Handle flipping a card
function flipCard() {
  if (!canFlip || this.classList.contains('flipped')) return;

  const img = this.querySelector('img');
  const front = this.querySelector('div.d-flex');

  img.style.display = 'block';
  front.style.display = 'none';
  
  this.classList.add('flipped');
  flippedCards.push(this);

  if (flippedCards.length === 2) {
    moves++;
    document.getElementById('moves').textContent = moves;
    canFlip = false;

    const [card1, card2] = flippedCards;

    if (card1.dataset.landmark === card2.dataset.landmark) {
      matchedPairs++;
      document.getElementById('matches').textContent = matchedPairs;
      flippedCards = [];
      canFlip = true;

      if (matchedPairs === 8) {
        setTimeout(() => {
          winModal.show();
        }, 500);
      }
    } else {
      setTimeout(() => {
        card1.querySelector('img').style.display = 'none';
        card1.querySelector('div.d-flex').style.display = 'flex';
        card2.querySelector('img').style.display = 'none';
        card2.querySelector('div.d-flex').style.display = 'flex';
        
        card1.classList.remove('flipped');
        card2.classList.remove('flipped');
        flippedCards = [];
        canFlip = true;
      }, 1000);
    }
  }
}

// Set up event listeners and start game
document.addEventListener('DOMContentLoaded', () => {
  winModal = new bootstrap.Modal(document.getElementById('winModal'));
  initGame();
  document.getElementById('resetBtn').addEventListener('click', initGame);
  document.getElementById('playAgainBtn').addEventListener('click', initGame);
});