<?php
include 'koneksi.php';

// Add tanggal_jatuh_tempo to tagihan
$sql = "SHOW COLUMNS FROM tagihan LIKE 'tanggal_jatuh_tempo'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $sql = "ALTER TABLE tagihan ADD COLUMN tanggal_jatuh_tempo DATE DEFAULT NULL";
    if ($conn->query($sql) === TRUE) {
        echo "Column tanggal_jatuh_tempo added successfully to tagihan table.<br>";
    } else {
        echo "Error adding column: " . $conn->error . "<br>";
    }
} else {
    echo "Column tanggal_jatuh_tempo already exists.<br>";
}

// Check auth_check.php content
echo "Checking auth_check.php...<br>";
if (file_exists('auth_check.php')) {
    echo "auth_check.php exists.<br>";
} else {
    echo "auth_check.php does NOT exist.<br>";
}

// Modify nama_pemilik.no to VARCHAR(50) to support room numbers as PK
$sql = "SHOW COLUMNS FROM nama_pemilik LIKE 'no'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if (strpos($row['Type'], 'int') !== false) {
    $sql = "ALTER TABLE nama_pemilik MODIFY COLUMN no VARCHAR(50)";
    if ($conn->query($sql) === TRUE) {
        echo "Column 'no' in 'nama_pemilik' modified to VARCHAR(50).<br>";
    } else {
        echo "Error modifying column: " . $conn->error . "<br>";
    }
} else {
    echo "Column 'no' in 'nama_pemilik' is already correct type.<br>";
}
?>
