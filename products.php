<?php
session_start();
require 'check_if_added.php';  
require 'prod.php';


$db = mysqli_connect("localhost", "root", "", "store");


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$products_per_page = 12;


$search_conditions = array();


if(isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = $_GET['query'];
    
    $search_conditions[] = "(name LIKE '%$search_query%' OR brand LIKE '%$search_query%' OR Category LIKE '%$search_query%')";
}


if(isset($_GET['brand']) && is_array($_GET['brand']) && !empty($_GET['brand'])) {
    $brands = implode("','", $_GET['brand']);
    
    $search_conditions[] = "brand IN ('$brands')";
}


if(isset($_GET['Category']) && is_array($_GET['Category']) && !empty($_GET['Category'])) {
    $categories = implode("','", $_GET['Category']);
    
    $search_conditions[] = "Category IN ('$categories')";
}

if(isset($_GET['gcard']) && ($_GET['gcard'] == '1' || $_GET['gcard'] == '0')) {
    $gcard = $_GET['gcard'];
    
    $search_conditions[] = "gcard = $gcard";
}


if(isset($_GET['ram_size']) && is_array($_GET['ram_size']) && !empty($_GET['ram_size'])) {
    $ram_sizes = implode("','", $_GET['ram_size']);
    
    $search_conditions[] = "ram IN ('$ram_sizes')";
}


if(isset($_GET['ram_type']) && is_array($_GET['ram_type']) && !empty($_GET['ram_type'])) {
    $ram_types = $_GET['ram_type'];
    $ram_conditions = array();
    foreach ($ram_types as $ram_type) {
        
        if (strpos($ram_type, 'LP') !== false) {
            $ram_conditions[] = "ddr LIKE '%$ram_type%'";
        } else {
            $ram_conditions[] = "ddr = '$ram_type'";
        }
    }
    
    $ram_type_condition = '(' . implode(' OR ', $ram_conditions) . ')';
    
    $search_conditions[] = $ram_type_condition;
}




$where_clause = '';
if(!empty($search_conditions)) {
    $where_clause = ' WHERE ' . implode(' AND ', $search_conditions);
}


$query = "SELECT id, name, Configuration, price, Category, brand FROM items" . $where_clause;


if(isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $query .= " ORDER BY price " . ($sort === 'price_asc' ? 'ASC' : 'DESC') . " ";
} else {
    $query .= " ORDER BY price ASC ";  
}

$start = ($page - 1) * $products_per_page;
$query .= " LIMIT $start, $products_per_page";

$result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/Grandline.png" />
    <title>GrandLine Laptops</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <style>
       
    </style>

</head>

<body>

    <div>
        <?php require 'header.php'; ?>

        <div class="container">
            <div class="row">
                <?php
                // Display product details and images
                while ($product = mysqli_fetch_assoc($result)) :
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail" style="width:230px;height:550px;">
                            
                                <img src="img/<?php echo $product['name']; ?>.jpg" alt="<?php echo $product['name']; ?>" style="height:150px; margin-top:20px;">
                            
                            <center>
                                <div class="caption">
                                    <?php prod_info($product['id']); ?>
                                    <button class="btn btn-block btn-primary add-to-cart-btn" data-item-id="<?php echo $product['id']; ?>">Add to cart</button>
                                </div>
                            </center>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="container text-center">
            <ul class="pagination" style="display:inline-block;">
                <?php
                // Generate pagination links
                $total_pages_query = "SELECT COUNT(*) as total FROM items" . $where_clause;
                $total_pages_result = mysqli_query($db, $total_pages_query);
                $total_pages_row = mysqli_fetch_assoc($total_pages_result);
                $total_pages = ceil($total_pages_row['total'] / $products_per_page);

                $prev_page = $page - 1;
                if ($prev_page > 0) {
                    $prev_link = http_build_query(array_merge($_GET, array("page" => $prev_page)));
                    echo "<li class='page-item'><a class='page-link' href='?$prev_link'>Prev</a></li>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    $page_link = http_build_query(array_merge($_GET, array("page" => $i)));
                    if ($i == $page) {
                        echo "<li class='page-item active'><a class='page-link' href='?$page_link'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?$page_link'>$i</a></li>";
                    }
                }

                $next_page = $page + 1;
                if ($next_page <= $total_pages) {
                    $next_link = http_build_query(array_merge($_GET, array("page" => $next_page)));
                    echo "<li class='page-item'><a class='page-link' href='?$next_link'>Next</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <br><br><br><br><br><br><br><br>
    <footer class="footer">
        <div class="container">
            <center>
                <p>Copyright &copy <a href="https://sbsales.in">sbsales</a> Store. All Rights Reserved.</p>
                <p>This website is developed by The Wolfpack</p>
            </center>
        </div>
    </footer>

    <script>
    
    $(document).ready(function() {

    $('.add-to-cart-btn').click(function() {
        var button = $(this); 
        var itemId = button.data('item-id');
        
        $.ajax({
            url: 'cart_add.php',
            type: 'GET',
            data: {
                id: itemId
            },
            success: function(response) {
                
                if (response.trim() === 'Item added to cart successfully!' || response.trim() === 'You have already added the maximum quantity of this item to your cart.') {
                    
                    alert(response);
                } else {
                    
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                
                console.error(xhr.responseText);
            }
        });
        
        return false;
    });
});


    window.watsonAssistantChatOptions = {
    integrationID: "3f494a05-38aa-4751-a510-1273dd072d6a",
    region: "us-south", 
    serviceInstanceID: "f6d067bf-3768-4fbc-ad58-45f50166529b",
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
