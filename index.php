<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Siraj Oman - Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
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

  <main class="container mt-4">
    <h1 class="text-center mb-4">Welcome to Siraj Oman</h1>

    <div class="row">
      <div class="col-12 mb-4">
        <h2 class="h4">Our Project: Siraj Oman</h2>
        <p class="lead">
          Our project is called "Siraj Oman," which means "Lantern of Oman." It will be a simple and easy-to-use website. 
          The main feature is an interactive map of Oman that helps tourists and locals find interesting places to visit.
        </p>
      </div>
    </div>

    <!-- Featured Places Section -->
    <section class="mb-5">
      <h2 class="text-center mb-4">Discover Amazing Places in Oman</h2>
      <div class="row g-4">
        <!-- Place 1 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="./images/placeholder_image_01.jpg" class="card-img-top" alt="Sultan Qaboos Grand Mosque" style="height: 200px; object-fit: cover;" />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Sultan Qaboos Grand Mosque</h5>
              <p class="card-text flex-grow-1">
                One of the most beautiful mosques in the world, located in Muscat.
              </p>
              <span class="badge bg-secondary">Muscat</span>
            </div>
          </div>
        </div>

        <!-- Place 2 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="./images/placeholder_image_02.jpg" class="card-img-top" alt="Wahiba Sands" style="height: 200px; object-fit: cover;" />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Wahiba Sands</h5>
              <p class="card-text flex-grow-1">
                Vast desert with towering dunes, perfect for camel riding and Bedouin culture.
              </p>
              <span class="badge bg-secondary">Al Sharqiyah</span>
            </div>
          </div>
        </div>

        <!-- Place 3 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="./images/placeholder_image_03.jpg" class="card-img-top" alt="Nizwa Fort" style="height: 200px; object-fit: cover;" />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Nizwa Fort</h5>
              <p class="card-text flex-grow-1">
                Historical 17th-century fortress with panoramic city views.
              </p>
              <span class="badge bg-secondary">Nizwa</span>
            </div>
          </div>
        </div>

        <!-- Place 4 -->
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card h-100">
            <img src="./images/placeholder_image_04.jpg" class="card-img-top" alt="Wadi Shab" style="height: 200px; object-fit: cover;" />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Wadi Shab</h5>
              <p class="card-text flex-grow-1">
                Canyon with emerald pools, waterfalls, and hidden caves.
              </p>
              <span class="badge bg-secondary">Al Sharqiyah</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- How It Works -->
    <section class="mb-5">
      <h2 class="text-center mb-4">How Siraj Oman Works</h2>
      <div class="row text-center">
        <div class="col-12 col-md-4 mb-3">
          <div class="p-3 bg-light rounded">
            <div class="display-6 text-primary mb-2">1</div>
            <h5>Explore the Map</h5>
            <p>Use our interactive map to discover places across Oman</p>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-3">
          <div class="p-3 bg-light rounded">
            <div class="display-6 text-primary mb-2">2</div>
            <h5>Find Your Interest</h5>
            <p>Filter by location type, activities, or region</p>
          </div>
        </div>
        <div class="col-12 col-md-4 mb-3">
          <div class="p-3 bg-light rounded">
            <div class="display-6 text-primary mb-2">3</div>
            <h5>Plan Your Visit</h5>
            <p>Get directions, opening hours, and local tips</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Auto-Rotating Photo Gallery (Slideshow) -->
    <section class="mb-5">
      <h2 class="text-center mb-3">Oman Highlights</h2>
      <div id="omarSlideshow" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner rounded">
          <div class="carousel-item active">
            <img src="./images/placeholder_image_01.jpg" class="d-block w-100" alt="Grand Mosque" style="height: 300px; object-fit: cover;" />
          </div>
          <div class="carousel-item">
            <img src="./images/placeholder_image_02.jpg" class="d-block w-100" alt="Wahiba Sands" style="height: 300px; object-fit: cover;" />
          </div>
          <div class="carousel-item">
            <img src="./images/placeholder_image_03.jpg" class="d-block w-100" alt="Nizwa Fort" style="height: 300px; object-fit: cover;" />
          </div>
          <div class="carousel-item">
            <img src="./images/placeholder_image_04.jpg" class="d-block w-100" alt="Wadi Shab" style="height: 300px; object-fit: cover;" />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#omarSlideshow" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#omarSlideshow" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
  </main>

  <!-- Scrolling Welcome Banner -->
  <div class="bg-dark text-warning py-2">
    <marquee behavior="scroll" direction="left" class="fw-bold">
      Welcome to the Siraj Oman website! Today is <span id="current-date-time"></span>
    </marquee>
  </div>

  <footer class="bg-light text-center py-3 mt-4">
    <p class="mb-0">&copy; 2025 Siraj Oman | 
      <a href="index.php" class="text-primary">Home</a> | 
      <a href="contact.php" class="text-primary">Contact</a> | 
      <a href="about.php" class="text-primary">About</a>
    </p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <!-- Live Date/Time for Scrolling Banner -->
  <script>
    // Update the current date and time for the scrolling banner
    function updateDateTime() {
      const now = new Date();
      const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
      };
      document.getElementById('current-date-time').textContent = now.toLocaleDateString('en-US', options);
    }
    // Update immediately and then every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
  </script>

</body>
</html>