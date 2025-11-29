<?php
include 'koneksi.php';

$sql = file_get_contents('seed_data.sql');

// Split SQL by semicolon to execute multiple queries
$queries = explode(';', $sql);

foreach ($queries as $query) {
    $query = trim($query);
    if (!empty($query)) {
        if ($conn->query($query) === TRUE) {
            echo "Query executed successfully: " . substr($query, 0, 50) . "...\n";
        } else {
            echo "Error executing query: " . $conn->error . "\n";
        }
    }
}

echo "Seeding completed.\n";
?>
