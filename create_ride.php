

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create Ride</title>
</head>
<body>
    <h1>Create Ride</h1>
    <form method="POST">
        <label for="driver_id">Driver ID:</label>
        <input type="text" id="driver_id" name="driver_id" required>
        <label for="pickup_location">Pickup Location:</label>
        <input type="text" id="pickup_location" name="pickup_location" required>
        <label for="dropoff_location">Dropoff Location:</label>
        <input type="text" id="dropoff_location" name="dropoff_location" required>
        <label for="ride_time">Ride Time:</label>
        <input type="datetime-local" id="ride_time" name="ride_time" required>
        <button type="submit">Create Ride</button>
    </form>
</body>
</html>
