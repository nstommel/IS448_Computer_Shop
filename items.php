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
            .container-fluid > .row {
                display: flex;
                flex-wrap: wrap;
                padding: 10px;
            }
            .container-fluid > .row > div[class*='col-'] {
                display: flex;
                padding: 10px;
            }
            .card-body {
                padding: 10px;
                background-color: #dfdfdf;
                border-radius: 0 0 3px 3px;
            }
            h5 {
                margin-top: 0px;
                margin-bottom: 0px;
            }
            .card {
                width: 100%
            }
            .card-img-top {
                width: 100%;
                height: 38vh;
                /*object-fit cover does not stretch images*/
                object-fit: cover;
            }
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
        <div class="container-fluid float-left" style="margin-top: 75px;">                                    
            <form class="form-inline" id="itemOrderBy" action="javascript:void(0)" onsubmit="showItems()">
                <div class="form-group mr-2">
                    <label for="orderByItem">Item Order</label>
                </div>
                <div class="form-group mr-2">
                    <select class="form-control" name="orderByItem">
                        <option value="skuAsc" selected>SKU # Ascending</option>
                        <option value="skuDesc">SKU # Descending</option>
                        <option value="nameAsc">Item Name Ascending</option>
                        <option value="nameDesc">Item Name Descending</option>
                        <option value="brandAsc">Brand Name Ascending</option>
                        <option value="brandDesc">Brand Name Descending</option>
                        <option value="typeAsc">Item Type Ascending</option>
                        <option value="typeDesc">Item Type Descending</option>
                        <option value="costAsc">Cost Ascending</option>
                        <option value="costDesc">Cost Descending</option>                        
                    </select>
                </div>
                <div class="form-group mr-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." value="" name="searchTerm" id="searchInput"/>
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="button" id="clear" onclick="clearSearchInput()">X</button>
                        </div>
                    </div>
                </div>
                <div class ="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Refresh" />
                </div>
            </form>
        </div>
        <div id="items"></div>
        <script>
            $(document).ready(function(){                                
                showItems();
                updateCartIndicator();
            });             
        </script>
    </body>
</html>