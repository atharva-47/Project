<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

$user_id = $_GET['id'];

$check_cart_query = "SELECT COUNT(*) AS total_items FROM users_items WHERE user_id='$user_id'";
$check_cart_result = mysqli_query($con, $check_cart_query) or die(mysqli_error($con));
$cart_info = mysqli_fetch_assoc($check_cart_result);
$total_items_in_cart = $cart_info['total_items'];

if ($total_items_in_cart == 0) {
    header('location: cart.php?empty_cart=true');
    exit;
}

$user_cart_query = "SELECT it.id, it.name, it.price, ut.quantity FROM users_items ut INNER JOIN items it ON it.id = ut.item_id WHERE ut.user_id = '$user_id'";
$user_cart_result = mysqli_query($con, $user_cart_query) or die(mysqli_error($con));

while ($row = mysqli_fetch_array($user_cart_result)) {
    $item_id = $row['id'];
    $quantity = $row['quantity'];
    $order_date = date('Y-m-d H:i:s');

    $insert_order_query = "INSERT INTO order_history (user_id, item_id, quantity, order_date) VALUES ('$user_id', '$item_id', '$quantity', '$order_date')";
    mysqli_query($con, $insert_order_query) or die(mysqli_error($con));
}

$confirm_query = "UPDATE users_items SET status='Confirmed' WHERE user_id='$user_id'";
$confirm_query_result = mysqli_query($con, $confirm_query) or die(mysqli_error($con));

$clear_cart_query = "DELETE FROM users_items WHERE user_id='$user_id'";
$clear_cart_result = mysqli_query($con, $clear_cart_query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>GrandLine Laptops</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <p>Your order is confirmed. Thank you for shopping with us. <a href="order_history.php">Click here</a> to view your order history. <a href="products.php">Click here</a> to purchase any other item.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <center>
                    <p>Copyright &copy <a href="http://localhost/project/sbsales/index.php">GrandLine Laptops</a> Store. All Rights Reserved.</p>
                    <p></p>
                </center>
            </div>
        </footer>
    </div>
</body>
</html>
