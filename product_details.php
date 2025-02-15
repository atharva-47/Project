<?php
session_start();
require 'check_if_added.php';  

// Database connection
$db = mysqli_connect("localhost", "root", "", "store");

if(isset($_GET['model'])) {
    $model = $_GET['model'];
    
    // Fetch product details from the database based on the model
    $query = "SELECT * FROM items WHERE name = '$model'";
    $result = mysqli_query($db, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $product['name']; ?> - Product Details</title>
    <link rel="shortcut icon" href="img/Grandline.png" />
    <title>GrandLine Laptops</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="bootstrap/js/jquery-3.6.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/navbar.css" type="text/css">
</head>

<body>

    <?php require 'header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Display product image -->
                <img src="img/<?php echo $product['name']; ?>.jpg" alt="<?php echo $product['name']; ?>" style="width: 100%;">
            </div>
            <div class="col-md-6">
                <!-- Display product details -->
                <h2><?php echo $product['name']; ?></h2>
                <p><strong>Brand:</strong> <?php echo $product['brand']; ?></p>
                <p><strong>Category:</strong> <?php echo $product['Category']; ?></p>
                <p><strong>Configuration:</strong> <?php echo $product['Configuration']; ?></p>
                <p><strong>Price:</strong> RS. <?php echo $product['price']; ?></p>
                <!-- Add to cart button -->
<?php if (!isset($_SESSION['email'])) { ?>
    <p><a href="login.php" role="button" class="btn btn-primary">Login to Buy</a></p>
<?php } else {
    if (check_if_added_to_cart($product['id'])) { ?>
        <a href="#" class="btn btn-primary btn-add-to-cart disabled" data-item-id="<?php echo $product['id']; ?>">Added to Cart</a>
    <?php } else { ?>
        <a href="#" class="btn btn-primary btn-add-to-cart" data-item-id="<?php echo $product['id']; ?>">Add to Cart</a>
    <?php }
} ?>

                <div id="cartMessage"></div>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript code here -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // AJAX function to add item to cart
        $(document).on('click', '.btn-add-to-cart', function(e) {
            e.preventDefault();
            var button = $(this); // Store the button element
            var itemId = button.data('item-id');

            $.ajax({
                type: 'GET',
                url: 'cart_add.php',
                data: { id: itemId },
                success: function(response) {
                    // Process response here
                    if (response === "Max quantity reached") {
                        $('#cartMessage').html('<div class="alert alert-warning">Max quantity reached for this item.</div>');
                    } else {
                        $('#cartMessage').html('<div class="alert alert-success">' + response + '</div>');
                        // Disable the button only if the max quantity is reached
                        if (response === "Added to Cart") {
                            button.addClass('disabled').text('Added to Cart');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                    $('#cartMessage').html('<div class="alert alert-danger">Error occurred while adding to cart.</div>');
                }
            });
        });
    });



    window.watsonAssistantChatOptions = {
    integrationID: "3f494a05-38aa-4751-a510-1273dd072d6a", // The ID of this integration.
    region: "us-south", // The region your integration is hosted in.
    serviceInstanceID: "f6d067bf-3768-4fbc-ad58-45f50166529b", // The ID of your service instance.
    onLoad: async (instance) => { await instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });

</script>

</body>

</html>

<?php
    } else {
        
        echo "<h3>Product not found.</h3>";
    }
} else {
    
    header("Location: products.php");
    exit();
}
?>
