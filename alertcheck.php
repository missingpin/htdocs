<?php
include 'connect.php';

$query = "SELECT productname, quantity, last_updated FROM product WHERE quantity <= 50 ORDER BY last_updated DESC";

if ($con) {
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    $lowStockProducts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $lowStockProducts[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($lowStockProducts);
} else {
    die("Connection is not established.");
}

mysqli_close($con);
?>
