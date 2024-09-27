<?php
include 'connect.php';

if (isset($_POST['productSend']) && isset($_POST['quantitySend']) && isset($_POST['expirationSend']) && isset($_FILES['imageSend'])) {

    $productSend = $_POST['productSend'];
    $quantitySend = $_POST['quantitySend'];
    $expirationSend = $_POST['expirationSend'];
    
    $image = $_FILES['imageSend'];
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    
    $uploadDir = 'uploads/';
    $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $newImageName = uniqid("IMG_", true) . '.' . $imageExtension; // Unique file name
    $uploadFile = $uploadDir . $newImageName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageExtension, $allowedTypes)) {
        echo "Error: Only image files (JPG, JPEG, PNG, GIF) are allowed.";
        exit();
    }

    if (move_uploaded_file($imageTmpName, $uploadFile)) {
        $stmt = $con->prepare("INSERT INTO product (productname, quantity, exp, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $productSend, $quantitySend, $expirationSend, $newImageName); // "siss" - string, integer, string, string
        
        if ($stmt->execute()) {
            echo "Product added successfully!";
        } else {
            echo "Error: Could not execute query.";
        }
        
        $stmt->close();
    } else {
        echo "Error: File upload failed.";
    }
}
?>
