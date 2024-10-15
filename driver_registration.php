

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Driver Registration</title>
</head>
<body>
    <h1>Driver Registration</h1>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="vehicle_details">Vehicle Details:</label>
        <input type="text" id="vehicle_details" name="vehicle_details" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
