
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Payment Processing</title>
</head>
<body>
    <h1>Process Payment</h1>
    <form method="POST">
        <label for="booking_id">Booking ID:</label>
        <input type="text" id="booking_id" name="booking_id" required>
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>
        <button type="submit">Process Payment</button>
    </form>
</body>
</html>
