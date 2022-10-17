<?php

$db = new SQLite3("../database/catalog.db");
$db->exec("PRAGMA foreign_keys = ON");
$db->enableExceptions(true);
//var_dump($_POST);
$orderby = $_POST["orderByItem"];
$searchTerm = '%' . trim($_POST["searchTerm"]) . '%';

try {
    // Avoid SQL injection with ORDER BY using static strings instead of
    // inserting a PHP variable into the query method. Bind search term value
    // to avoid another possibility of SQL injection. Note that all results match
    // the string "%%" using LIKE if searchTerm is empty.
    switch ($orderby) {
        case "skuAsc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY sku ASC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "skuDesc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY sku DESC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "nameAsc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY name COLLATE NOCASE ASC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "nameDesc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY name COLLATE NOCASE DESC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "brandAsc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY brand COLLATE NOCASE ASC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "brandDesc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY brand COLLATE NOCASE DESC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "typeAsc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY type COLLATE NOCASE ASC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "typeDesc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY type COLLATE NOCASE DESC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "costAsc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY cost ASC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        case "costDesc":
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY cost DESC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
        // Use default sku order if for some reason incorrect data is posted. This avoids
        // breaking page functionality if incorrect requests are sent.
        default:
            $stmt = $db->prepare("SELECT * FROM items WHERE name LIKE :term UNION SELECT * FROM items WHERE brand LIKE :term ORDER BY sku ASC");
            $stmt->bindValue(':term', $searchTerm, SQLITE3_TEXT);
            $result = $stmt->execute();
            break;
    } 
    
    if (!$result->fetchArray()) {
        echo '<div class="container-fluid float-left"><h3 class="mt-4 ml-4">No matching items found.</h3></div>';
        $db->close();
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
                                '<input class="btn btn-primary mt-2" type="button" value="Add To Cart" onclick="addItemToCart(\'' . $row["sku"] . '\')" />' .                            
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

