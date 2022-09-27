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
        <script src="computerShop.js"></script>
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
        <div class="container-fluid float-left" style="margin-top: 75px">
            <div id="cart"></div>
        </div>
        <script>                       
            $(document).ready(function(){                                
                showCart();
                updateCartIndicator();
            }); 
        </script>
    </body>
</html>

