<?php
    // The following code prevents page caching, so when using the back button
    // to go back to the items page, the cart indicator isn't displayed incorrectly
    // Note: Doesn't work on Firefox for some reason, pages are still cached.
    header("Content-Type: text/html");
    header("Expires: 0");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Include Bootstrap 4 CSS and JS with jQuery Ajax-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="javascript/computerShop.js"></script>
        <style>            
        </style>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand font-weight-bold" href="">Quality Computers</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="items.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="brands.php">Brands</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <a class="btn btn-light ml-auto mr-2" href="cart.php">Cart (<span id="numCartItems"></span>)</a>
            </div>
        </nav>
        <div id="itemPage" class="container-fluid" style="margin-top: 75px;">
            <?php 
                $getSKU = $_GET['sku'];
                $db = new SQLite3("database/catalog.db");
                $result = $db->query("SELECT * FROM items WHERE sku = " . $getSKU);
                
                while($row = $result->fetchArray()){
                echo '<h1 class="text-center">' . $row['brand'] . " " . $row['name'] . '</h1><hr>' .
                     '<div class="row">' .
                        '<div class="col-sm-5">' .
                            '<div>' .
                                '<img class="border-right img-fluid" style="padding-right: 20px" src="item-imgs/' . $getSKU . '.jpg" alt="Card image cap">' .
                            '</div>' .
                        '</div>' .
                        '<div class="col-sm-7 p-sm-5 my-sm-5">' . 
                            '<h3 class="text-center">' . $row["description"] . '</h3>' .
                            '<h3 class="text-center">$' . number_format($row['cost'], 2, ".", ",") . '</h3>' .
                            '<input class="btn-block btn-primary rounded mt-2" type="button" value="Add To Cart" style="font-size:2em" onclick="addItemToCart(\'' . $row["sku"] . '\')" />' .
                        '</div>' .
                    '</div>';
                }
            ?>
        </div>
        <script>
            // Update cart indicator when document has fully loaded.
            $(document).ready(function(){                                                
                updateCartIndicator();
            });            
        </script>
    </body>
</html>

