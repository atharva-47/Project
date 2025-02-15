      
<?php

function prod_info($id) {
    $db = mysqli_connect("localhost", "root", "", "store");

    $result = mysqli_query($db, "SELECT name, brand, Configuration, price, Category, gcard, ram, ddr FROM items WHERE id = $id");

    while ($row = mysqli_fetch_assoc($result)) {
        $model = $row['name'];
        $category = $row['Category'];
        $config = $row['Configuration'];
        $price = $row['price'];
        $brand = $row['brand'];
        $gcard = $row['gcard'] ? 'With Graphics Card' : 'Without Graphics Card';

        echo "<a href='product_details.php?model=$model'><h2>$model</h2></a>";
        echo "<b>Brand: $brand</b>";
        echo "<p>Category: $category</p>";
        echo "<p>Configuration: " . substr($config, 0, 80) . "......</p>";

      
        echo "<p>Price: <b>RS. $price</b></p>";
        
    }
}





?>
