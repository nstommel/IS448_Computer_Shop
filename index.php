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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
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
        <div class="container-fluid" style="margin-top: 75px;">
            <h1 class="text-center">Welcome to Quality Computers</h1>
            <?php 
                $db = new SQLite3("database/catalog.db");
                $result = $db->query("SELECT * FROM items WHERE sku = 1");
                while($row = $result->fetchArray()){
                    echo 
                    '<div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="item.php?sku=' . $row['sku'] . '"><img src="item-imgs/' . $row["sku"] . '.jpg" class="img-fluid mb-sm-5" style="display: block; margin: auto; width: 40%" alt="..."></a>
                                <div class="carousel-caption" style="color:black;"><h4>' . $row["brand"] . ' ' . $row["name"] . '</h4></div>
                            </div>';
                }
                $result = $db->query("SELECT * FROM items WHERE sku != 1 ORDER BY sku ASC");
                while($row = $result->fetchArray()){
                    echo '
                            <div class="carousel-item">
                                <a href="item.php?sku=' . $row['sku'] . '"><img src="item-imgs/' . $row["sku"] . '.jpg" class="img-fluid mb-sm-5" style="display: block; margin: auto; width: 40%;" alt="..."></a>
                                <div class="carousel-caption" style="color:black;"><h4>' . $row["brand"] . ' ' . $row["name"] . '</h4></div>
                            </div>';      
                }
                echo '  </div>
                        <button class="carousel-control-prev" type="button" data-target="#carousel" style="background-color:black;" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carousel" style="background-color:black;" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>'; 
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
