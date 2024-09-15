<?php
// Include the database connection file
include 'connection.php';

// Fetch data from the database
$sql = "SELECT subject, announcement, status, timestamp_posted, date_created FROM announcements";
$result = $conn->query($sql);

$events = [];

if ($result->num_rows > 0) {
    // Fetch all the rows and store them in an array
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Return the data as JSON
echo json_encode($events);

// Close the database connection
$conn->close();
?>
