<?php
    
    function check_if_added_to_cart($item_id){
       
        require 'connection.php';
        $user_id=$_SESSION['id'];

   
        $check_quant_query = "SELECT quantity FROM users_items WHERE item_id='$item_id' AND user_id='$user_id' AND status='Added to cart'";
        $check_quant_result = mysqli_query($con, $check_quant_query) or die(mysqli_error($con));


        if ($check_quant_result && mysqli_num_rows($check_quant_result) > 0) {
            $row = mysqli_fetch_assoc($check_quant_result);
            $quantity = $row['quantity'];
        
            
            if ($quantity > 0 && $quantity < 5) {
                return 0;
            } else {
                return 1;
            }
        } else {
           
            return 0;
        }

    }
?>