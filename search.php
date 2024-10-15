<?php
// Database connection details
$host = 'localhost';  // Replace with your database host
$user = 'root';       // Replace with your database username
$password = '';       // Replace with your database password
$dbname = 'carpool_db'; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$leaving_from = $_POST['leaving-from'];
$going_to = $_POST['going-to'];
$date = $_POST['date'];
$passengers = $_POST['passengers'];

// Prepare SQL query to search for available carpools
$sql = "SELECT * FROM carpools WHERE leaving_from = ? AND going_to = ? AND date = ? AND available_seats >= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssi', $leaving_from, $going_to, $date, $passengers);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheCarpooligans</title>
    
    <!-- Use relative paths for the CSS and JS files -->
    <link rel="stylesheet" href="styles1.css">
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
            <form id="search-form" div class="search-bar" method="POST" action="search.php">
                <input type="text" placeholder="Leaving From" id="leaving-from" name="leaving-from" required>
                <input type="text" placeholder="Going To" id="going-to" name="going-to" required>
                <input type="date" id="date" name="date" required>
                <input type="number" placeholder="Passengers" id="passengers" name="passengers" min="1" max="10" required>
                <button id="search-btn" type="submit">Search</butto>
            </form>
        </div>
        <div id="map"></div>

    </header>
    <!-- Script for Map and Google Maps API Integration -->
    <script>
        let map;
        let directionsService;
        let directionsRenderer;

        function initMap() {
            // Map options for Google Maps
            const mapOptions = {
                zoom: 8,
                center: { lat: 9.994340, lng: 76.276756 }, // Default location (San Francisco)
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
    <!-- Image Section -->

    <div class="tbl_container">
        <h2>Available Carpools</h2>

        <?php
        if ($result->num_rows > 0) {
            // Table to display carpools
            echo "<table>";
            echo "<tr>
                    <th>Carpool ID</th>
                    <th>Leaving From</th>
                    <th>Going To</th>
                    <th>Date</th>
                    <th>Available Seats</th>
                  </tr>";
            
            // Fetch and display each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['leaving_from'] . "</td>
                        <td>" . $row['going_to'] . "</td>
                        <td>" . $row['date'] . "</td>
                        <td>" . $row['available_seats'] . "</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<div class='no-results'>No carpools found for your search criteria.</div>";
        }

        // Close connection
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>