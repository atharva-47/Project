<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

$user_id = $_SESSION['id'];

$order_history_query = "SELECT oh.id, oh.item_id, oh.quantity, oh.order_date, it.name AS product_name 
                        FROM order_history oh 
                        INNER JOIN items it ON oh.item_id = it.id
                        WHERE oh.user_id='$user_id'";
$order_history_result = mysqli_query($con, $order_history_query) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Order History</title>
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
                <div class="col-xs-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Order History</div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($order_history_result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['quantity'] . "</td>";
                                        echo "<td>" . $row['order_date'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
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
