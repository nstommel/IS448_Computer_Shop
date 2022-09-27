<?php
// Must start session to access shopping cart array
session_start();
foreach($_POST["quantity"] as $key => $val) {
    // Uncomment to echo each posted quantity to see in JS alert box
    // echo "key=" . $key .", value=" . $val . "\n";
    
    // Make sure SKU array key exists in shopping cart before updating quantity
    if (isset($_SESSION["shoppingCart"]) && array_key_exists($key, $_SESSION["shoppingCart"])) {        
        echo "This sku #" . $key . " is in the cart, updating quantity to " . $val . "\n";
        
        // Update session array with new values. 
        $_SESSION["shoppingCart"][$key] = $val;
                
    } else {
        // Invalid POST request, set header so ajax request detects failure and outputs error message
        header("HTTP/1.0 500 Internal Server Error");
        echo "Error, sku #" . $key . " is not in the cart, invalid POST request sent";
        die();
    }
}
// If we reach this point, all cart contents have been updated
echo "Successfully updated cart!";