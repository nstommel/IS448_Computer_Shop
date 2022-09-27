<?php
session_start();
$sku = intval($_POST['itemSKU']);
//echo $sku;

$db = new SQLite3("catalog.db");
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
        echo "record found\n";
        
        if(isset($_SESSION['shoppingCart'][$sku])) {
            echo "Item exists in shopping cart, adding 1\n";
            $_SESSION['shoppingCart'][$sku] += 1;
        } else {
            echo "Adding item to shopping cart\n";
            $_SESSION['shoppingCart'][$sku] = 1;
        }
        var_dump($_SESSION["shoppingCart"]);
        //Uncomment to purge cart contents
        //unset($_SESSION["shoppingCart"]);
        $db->close();
        exit();
    }
} catch (Exception $e) {
    //Set error header appropriately
    header("HTTP/1.0 500 Internal Server Error");        
    echo "Database error: " . $e->getMessage();
    $db->close();
    die();
}
