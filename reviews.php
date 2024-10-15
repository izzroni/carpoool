

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Ride Reviews</title>
</head>
<body>
    <h1>Reviews for Ride ID: <?php echo htmlspecialchars($ride_id); ?></h1>

    <section>
        <h2>Leave a Review</h2>
        <form method="POST">
            <label for="rating">Rating (out of 5):</label>
            <select id="rating" name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" rows="4" placeholder="Write your review..." required></textarea>

            <button type="submit">Submit Review</button>
        </form>
    </section>

    <section>
        <h2>All Reviews</h2>
        <?php if (count($reviews) > 0): ?>
            <ul>
                <?php foreach ($reviews as $review): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($review['reviewer_name']); ?></strong> (Rated: <?php echo htmlspecialchars($review['rating']); ?>/5)
                        <p><?php echo htmlspecialchars($review['comment']); ?></p>
                        <small>Reviewed on: <?php echo htmlspecialchars($review['created_at']); ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No reviews yet for this ride.</p>
        <?php endif; ?>
    </section>
</body>
</html>
