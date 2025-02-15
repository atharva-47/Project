<?php
session_start();
require 'connection.php'; 


if (!isset($_SESSION['id'])) {
    echo "You are not logged in.";
    exit;
}


if (!isset($_GET['id'])) {
    echo "Invalid request.";
    exit;
}

$item_id = $_GET['id'];
$user_id = $_SESSION['id'];


$check_item_query = "SELECT quantity FROM users_items WHERE user_id = ? AND item_id = ?";
$stmt = mysqli_prepare($con, $check_item_query);
mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        
        $item_row = mysqli_fetch_assoc($result);
        $quantity = $item_row['quantity'];

        
        if ($quantity < 5) {
            
            $update_quantity_query = "UPDATE users_items SET quantity = quantity + 1 WHERE user_id = ? AND item_id = ?";
            $stmt = mysqli_prepare($con, $update_quantity_query);
            mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
            mysqli_stmt_execute($stmt);
            echo "Item quantity updated successfully!";
        } else {
            
            echo "You have already added the maximum quantity of this item to your cart.";
        }
    } else { 
        
        $add_to_cart_query = "INSERT INTO users_items (user_id, item_id, status, quantity) VALUES (?, ?, 'Added to cart', 1)";
        $stmt = mysqli_prepare($con, $add_to_cart_query);
        mysqli_stmt_bind_param($stmt, "ii", $user_id, $item_id);
        mysqli_stmt_execute($stmt);
        echo "Item added to cart successfully!";
    }
} else {
    echo "Error occurred while processing your request.";
}

mysqli_close($con);
?>
