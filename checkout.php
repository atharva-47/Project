<?php
require 'connection.php';
require __DIR__ . "/vendor/autoload.php"; 

session_start();

if(!isset($_SESSION['email'])){
    header('location: login.php');
    exit;
}

$user_id = $_SESSION['id'];

$user_products_query = "SELECT it.id, it.name, it.price, ut.quantity FROM users_items ut INNER JOIN items it ON it.id=ut.item_id WHERE ut.user_id='$user_id'";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));

$line_items = array();
while($row = mysqli_fetch_array($user_products_result)) {
    
    $price_in_dollars_cents = round($row['price'] / 74.5 * 100); 

    
    $line_items[] = [
        "quantity" => $row['quantity'],
        "price_data" => [
            "currency" => "usd",
            "unit_amount" => $price_in_dollars_cents,
            "product_data" => [
                "name" => $row['name']
            ]
        ]
    ];
}

\Stripe\Stripe::setApiKey("sk_test_51OyFFVSEHy7bWZmw2Wt7edCx4ew9zAYgBx4slivAdVGYM7EK9uHEtCuZomtorZTCqUFWlnyYfylwEeUYzljO732n00t4jAAGod");

$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/project/sbsales/success.php?id=$user_id", 
    "cancel_url" => "http://localhost/project/sbsales/cart.php",
    "locale" => "auto",
    "line_items" => $line_items
]);

// Redirect to Checkout Session URL
header("Location: " . $checkout_session->url);
exit;
?>
