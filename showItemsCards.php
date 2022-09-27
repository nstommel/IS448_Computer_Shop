<?php

$db = new SQLite3("catalog.db");
$db->exec("PRAGMA foreign_keys = ON");
$db->enableExceptions(true);
//var_dump($_POST);
$orderby = $_POST["orderByItem"];

try {
    // Avoid SQL injection by only using the query method on static strings instead of
    // inserting a PHP variable into the query method.
    switch ($orderby) {
        case "skuAsc":
            $result = $db->query("SELECT * FROM items ORDER BY sku ASC");
            break;
        case "skuDesc":
            $result = $db->query("SELECT * FROM items ORDER BY sku DESC");
            break;
        case "nameAsc":
            $result = $db->query("SELECT * FROM items ORDER BY name COLLATE NOCASE ASC");
            break;
        case "nameDesc":
            $result = $db->query("SELECT * FROM items ORDER BY name COLLATE NOCASE DESC");
            break;
        case "brandAsc":
            $result = $db->query("SELECT * FROM items ORDER BY brand COLLATE NOCASE ASC");
            break;
        case "brandDesc":
            $result = $db->query("SELECT * FROM items ORDER BY brand COLLATE NOCASE DESC");
            break;
        case "typeAsc":
            $result = $db->query("SELECT * FROM items ORDER BY type COLLATE NOCASE ASC");
            break;
        case "typeDesc":
            $result = $db->query("SELECT * FROM items ORDER BY type COLLATE NOCASE DESC");
            break;
        case "costAsc":
            $result = $db->query("SELECT * FROM items ORDER BY cost ASC");
            break;
        case "costDesc":
            $result = $db->query("SELECT * FROM items ORDER BY cost DESC");
            break;
        // Use default sku order if for some reason incorrect data is posted. This avoids
        // breaking page functionality if incorrect requests are sent.
        default:
            $result = $db->query("SELECT * FROM items ORDER BY sku ASC");
            break;
    } 
    
    if (!$result->fetchArray()) {
        header("HTTP/1.0 500 Internal Server Error");
        echo "No records found.";
        $db->close();
        die();
    } else {
        $result->reset();
        echo    '<div class="container-fluid float-left">' .
                    '<div class="row">';                
        while ($row = $result->fetchArray()) {
            echo    '<div class="col-sm-3">' .
                        '<div class="card">' .
                            // Use https://redketchup.io/image-resizer to resize imgaes to 1000x1000 without stretching aspect ratio
                            // Include link on image to item page with sku number as $_GET parameter in URL.
                            '<a href="item.php?sku=' . $row['sku'] . '"><img class="card-img-top border-bottom" src="item-imgs/' . $row["sku"] . '.jpg" alt="Card image cap"></a>' .
                            '<div class="card-body">' .
                                '<h5 class="card-text">' . htmlspecialchars($row["name"]) . '</h5>' .
                                '<div class="card-text">' . htmlspecialchars($row["brand"]) . '</div>' .
                                '<div class="card-text">' . htmlspecialchars($row["type"]) . '</div>' .
                                '<div class="card-text">$' . number_format($row['cost'], 2, ".", ",") . '</div>' .
                                // Uncomment to show description on card.
                                //'<div class="card-text">' . htmlspecialchars($row["description"]) . '</div>' .
                                '<input class="btn btn-secondary mt-2" type="button" value="Add To Cart" onclick="addItemToCart(\'' . $row["sku"] . '\')" />' .                            
                            '</div>' .
                        '</div>' .
                    '</div>';
        }
        echo    '</div>' .
            '</div>';
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

