<?php

$conn = new mysqli(
    'localhost',
    'root',
    '',
    'blog_film'
) or die($conn->connect_error);

if ($conn->connect_error) {
    error_log("Database connection error: " . $conn->connect_error);
    die("Failed to connect to MySQL. Please try again later.");
}

function show_data($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
