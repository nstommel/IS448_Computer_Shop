<?php
session_start();
if (isset($_SESSION["shoppingCart"])) {
    $db = new SQLite3("catalog.db");
    $db->exec("PRAGMA foreign_keys = ON");
    $db->enableExceptions(true);

    $SKUVarArray = array();

    foreach ($_SESSION["shoppingCart"] as $sku => $value) {
        array_push($SKUVarArray, ":sku" . $sku);  
    }

    // Use implode to join sku binding names with commas within query string.
    $queryStr = "SELECT * FROM items WHERE sku IN (" . implode(", " , $SKUVarArray) . ")";
    // Uncomment to display database query string
    //echo $queryStr;

    // Avoid SQL injection, prepare and bind all variables to query string before execution.
    $stmt = $db->prepare($queryStr);
    foreach ($_SESSION["shoppingCart"] as $sku => $value) {
        $stmt->bindValue(":sku" . $sku, intval($sku), SQLITE3_INTEGER);
    }
    $result = $stmt->execute();

    $totalCost = 0; 

    // Uncomment to display session shopping cart variable.
    //var_dump($_SESSION['shoppingCart']);

    echo '<form class="was-validated" id="cartForm" method="post" action="javascript:void(0)" onsubmit="updateCart()">' .
            '<table class="table">' .
                '<tr>' .
                    '<th></th>' .
                    '<th>SKU</th>' .
                    '<th>Brand</th>' .
                    '<th>Name</th> ' .
                    '<th>Quantity</th> ' .
                    '<th>Price</th> ' .
                    '<th>Subtotal</th>' .
                    '<th>Remove</th>' .
                '</tr>';
    // Output record information for every sku in cart
    while ($row = $result->fetchArray()) {
        //var_dump($row);
        $subtotal = $_SESSION['shoppingCart'][$row['sku']] * $row['cost']; 
        $totalCost += $subtotal;
        // Note how the name of quantity contains square brackets. PHP conveniently converts such variables into arrays upon POST.
        echo    '<tr>' .
                    // Include link on image to item page with sku number as $_GET parameter in URL.
                    '<td style="vertical-align: middle;"><a href="item.php?sku=' . $row['sku'] . '"><img src="item-imgs/' . $row['sku'] . '.jpg" class="img-thumbnail" width="50" hieght="50" /></a></td>' .
                    '<td style="vertical-align: middle;">' . $row['sku'] . '</td>' .
                    '<td style="vertical-align: middle;">' . $row['brand'] . '</td>' .
                    '<td style="vertical-align: middle;">' . $row['name'] . '</td>' .
                    '<td style="vertical-align: middle;"><input class="form-control" type="number" min="1" step="1" name="quantity[' . $row['sku'] . ']" size="5" value="' . $_SESSION['shoppingCart'][$row['sku']] . '" required /></td>' .
                    '<td style="vertical-align: middle;">$' . number_format($row['cost'], 2, ".", ",")  . '</td>' .
                    '<td style="vertical-align: middle;">$' . number_format($_SESSION['shoppingCart'][$row['sku']] * $row['cost'], 2, ".", ",") . '</td>' .
                    '<td style="vertical-align: middle;"><input type="button" class="btn btn-secondary" value="Remove" onclick="removeItem(' . $row['sku'] . ')" /></td>' .
                '</tr>';
    }         
    echo        '<tr>' . 
                    '<td colspan="8"><span class="font-weight-bold">Total Cost: </span>$' . number_format($totalCost, 2, ".", ",") . '</td>' .
                '</tr>' .
            '</table>' .
            '<input type="submit" class="btn btn-primary" id="update" value="Update Cart" /> ' .
            '<input type="button" class="btn btn-primary" value="Clear Cart" onclick="clearCart()" /> ' .
            '<input type="button" class="btn btn-success" value="Place Order" onclick="placeOrder()" />' .
        '</form>';    
    $db->close();
} else {
    if (isset($_POST["orderPlaced"]) && $_POST["orderPlaced"] == "true") {
        echo '<h3 class="mt-2 ml-4">Order Placed Successfully!</h3>';
    } else {
        echo '<h3 class="mt-2 ml-4">No Items In Cart</h3>';
    }
}