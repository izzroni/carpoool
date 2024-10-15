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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carpool Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #252525;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #252525;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .no-results {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Carpools</h1>

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

