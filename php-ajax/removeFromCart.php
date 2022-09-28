<?php
session_start();
$sku = intval($_POST['itemSKU']);
//echo $sku;

$db = new SQLite3("../database/catalog.db");
$db->exec("PRAGMA foreign_keys = ON");
$db->enableExceptions(true);

try {
    $stmt = $db->prepare('SELECT * FROM items WHERE sku=:sku');
    $stmt->bindValue(':sku', $sku, SQLITE3_INTEGER);
    $result = $stmt->execute();
    //var_dump($result->fetchArray());
    if (!$result->fetchArray()) {
        header("HTTP/1.0 500 Internal Server Error");
        echo "No records found, posted SKU is invalid.";
        $db->close();
        die();
        
    } else {
        $result->reset();
        $row = $result->fetchArray();
        echo "SKU record found in database\n";
        
        if (isset($_SESSION['shoppingCart']) && isset($_SESSION['shoppingCart'][$sku])) {
            unset($_SESSION['shoppingCart'][$sku]);
            echo "Successfully deleted sku from cart\n";
            if (empty($_SESSION['shoppingCart'])) {
                unset($_SESSION['shoppingCart']);
                echo "Shopping cart empty, deleting shopping cart array";
            }
            $db->close();
            exit();
            
        } else {
            header("HTTP/1.0 500 Internal Server Error");        
            echo "Something went wrong, posted SKU is not in cart.";
            die();
        }
        var_dump($_SESSION["shoppingCart"]);
        
    }
} catch (Exception $e) {
    //Set error header appropriately
    header("HTTP/1.0 500 Internal Server Error");        
    echo "Database error: " . $e->getMessage();
    $db->close();
    die();
}
