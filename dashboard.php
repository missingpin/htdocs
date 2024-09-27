<?php
session_start();
include 'header.php';

if(isset($_SESSION['username'])) {
    echo null;
} else {
    header("Location:login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.cdnfonts.com/css/hobo-bt" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <Title> Welcome User! </Title>
    </div>
</head>
<body>
<h2 class="header">Welcome to the Dashboard!</h2>
</html>