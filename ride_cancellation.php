
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ride Cancellation</title>
</head>
<body>
    <h1>Cancel a Ride</h1>
    <ul>
        <?php foreach ($bookedRides as $ride): ?>
            <li>
                <?php echo "Ride ID: " . $ride['ride_id'] . ", Pickup: " . $ride['pickup_location'] . ", Dropoff: " . $ride['dropoff_location'] . ", Time: " . $ride['ride_time']; ?>
                <form method="POST" style="display:inline-block;">
                    <input type="hidden" name="booking_id" value="<?php echo $ride['booking_id']; ?>">
                    <button type="submit">Cancel</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
