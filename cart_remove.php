<?php
    require 'connection.php';
    session_start();
    
    $item_id = $_GET['id'];
    $user_id = $_SESSION['id'];

    
    $check_item_query = "SELECT * FROM users_items WHERE user_id = '$user_id' AND item_id = '$item_id'";
    $check_item_result = mysqli_query($con, $check_item_query) or die(mysqli_error($con));
    $num_rows = mysqli_num_rows($check_item_result);

    if ($num_rows > 0) {
        
        $row = mysqli_fetch_assoc($check_item_result);
        $current_quantity = $row['quantity'];

        
        if ($current_quantity > 1) {
            $update_quantity_query = "UPDATE users_items SET quantity = quantity - 1 WHERE user_id = '$user_id' AND item_id = '$item_id'";
            $update_quantity_result = mysqli_query($con, $update_quantity_query) or die(mysqli_error($con));
        } else {
            $remove_from_cart_query = "DELETE FROM users_items WHERE user_id = '$user_id' AND item_id = '$item_id'";
            $remove_from_cart_result = mysqli_query($con, $remove_from_cart_query) or die(mysqli_error($con));
        }
    }

    header('location: cart.php');
?>
