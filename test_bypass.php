<?php
session_start();
$_SESSION['username'] = 'testuser';
header("Location: dashboard.php");
?>