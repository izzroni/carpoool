

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Payment History</title>
</head>
<body>
    <h1>Payment History</h1>
    <table>
        <thead>
            <tr>
                <th>Payment ID</th>
                <th>Amount</th>
                <th>Pickup Location</th>
                <th>Dropoff Location</th>
                <th>Ride Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paymentHistory as $payment): ?>
                <tr>
                    <td><?php echo $payment['id']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
                    <td><?php echo $payment['pickup_location']; ?></td>
                    <td><?php echo $payment['dropoff_location']; ?></td>
                    <td><?php echo $payment['ride_time']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
