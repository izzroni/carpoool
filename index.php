<?php
session_start(); // Start the session at the beginning of the file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheCarpooligans</title>
    
    <!-- Use relative paths for the CSS and JS files -->
    <link rel="stylesheet" href="styles3.css">
    <script src="script.js" defer></script>
  
    <!-- Google Maps API Script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcMAdIt9kZXJx4qZMaC6ewcgF7OmP_WY8&libraries=places" defer></script>

    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <h1>TheCarpooligans</h1>
            <!-- Login/Sign Up/Logout Buttons -->
            <div class="auth-buttons">
                <?php
                if (isset($_SESSION['user_id'])) {
                    // User is logged in, show Logout button
                    echo '<button onclick="location.href=\'logout.php\'">Logout</button>';
                } else {
                    // User is not logged in, show Login and Sign Up buttons
                    echo '<button onclick="location.href=\'logon.php\'">Login</button>';
                }
                ?>
            </div>
        </div>

        <div class="search-bar">
            <form id="search-form" class="search-bar" method="POST" action="search.php">
                <input type="text" placeholder="Leaving From" id="leaving-from" name="leaving-from" required>
                <input type="text" placeholder="Going To" id="going-to" name="going-to" required>
                <input type="date" id="date" name="date" required>
                <input type="number" placeholder="Passengers" id="passengers" name="passengers" min="1" max="10" required>
                <button id="search-btn" type="submit">Search</button>
            </form>
        </div>

        <div id="map"></div>
    </header>

    <!-- Image Section -->
    <section class="pic-section">
        <h2>Welcome to TheCarpooligans</h2>
        <p>Simplify your daily commute, save money, and reduce your carbon footprint by joining our carpooling community.</p>
        <img src="solution_carpooling.jpg" alt="Carpool Image" class="pic">
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-buttons">
                <button onclick="location.href='about.html'">About Us</button>
                <button onclick="location.href='contact.html'">Contact Us</button>
                <button onclick="location.href='feedback.html'">Feedback</button>
            </div>
            <div class="footer-copyright">
                <b>&copy; <?php echo date("Y"); ?> TheCarpooligans</b>
            </div>
        </div>
    </footer>

    <!-- Script for Map and Google Maps API Integration -->
    <script>
        let map;
        let directionsService;
        let directionsRenderer;

        function initMap() {
            // Map options for Google Maps
            const mapOptions = {
                zoom: 8,
                center: { lat: 9.994340, lng: 76.276756 }, // Default location (Kochi, Kerala)
            };

            // Initialize the Google Map
            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            // Initialize Autocomplete for input fields
            const leavingFromInput = document.getElementById('leaving-from');
            const goingToInput = document.getElementById('going-to');
            new google.maps.places.Autocomplete(leavingFromInput);
            new google.maps.places.Autocomplete(goingToInput);

            // Add event listeners to the form inputs
            leavingFromInput.addEventListener('change', updateMap);
            goingToInput.addEventListener('change', updateMap);
        }

        function updateMap() {
            const leavingFrom = document.getElementById('leaving-from').value;
            const goingTo = document.getElementById('going-to').value;

            if (leavingFrom && goingTo) {
                const request = {
                    origin: leavingFrom,
                    destination: goingTo,
                    travelMode: 'DRIVING'
                };

                directionsService.route(request, function(result, status) {
                    if (status === 'OK') {
                        directionsRenderer.setDirections(result);
                    }
                });
            }
        }

        // Ensure map initializes after the page is loaded
        window.onload = initMap;
    </script>

</body>
</html>