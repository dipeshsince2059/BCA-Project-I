<?php
include('../config/constants.php');

// Query to find the top 3 most frequently booked activities
$sql = "SELECT u_activity, COUNT(u_activity) AS booking_count
        FROM booking
        GROUP BY u_activity
        ORDER BY booking_count DESC
        LIMIT 3";

$res = mysqli_query($conn, $sql);

if ($res && mysqli_num_rows($res) > 0) {
    echo "<h2>Top 3 Most Frequently Booked Activities:</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($res)) {
        $activity = $row['u_activity'];
        $booking_count = $row['booking_count'];
        echo "<li>$activity (Booked $booking_count times)</li>";
    }
    echo "</ul>";
} else {
    echo "No booking data available or failed to fetch the top booked activities.";
}
?>
