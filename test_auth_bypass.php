<?php
session_start();
$_SESSION['username'] = 'admin_test';
header("Location: dashboard.php");
?>