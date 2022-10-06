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
                    <li class="nav-index">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="items.php">Shop</a>
                    </li>
                    <li class="nav-brands">
                        <a class="nav-link" href="brands.php">Brands</a>
                    </li>
                    <li class="nav-about active">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <a class="btn btn-light ml-auto mr-2" href="cart.php">Cart (<span id="numCartItems"></span>)</a>
            </div>
        </nav>
        <div class="container-fluid float-left" style="margin-top: 75px;">
            <h3><em>Computer Shop<em></h3>            
                 <img src="site-imgs/computer_store.jpg" class="rounded float-right mr-4" alt="...">     
            <p><em>Our store has many laptops available for our customer<em><p>
            <p>We have customer service available 24/7 our cell phone number is +18007986474<p>
          
            <h4>Shopping Help</h4><!-- comment -->
            <p>when shopping add the laptop you want to the cart,and process the purchase</p><!-- comment -->
            <p>If you want to change or update your cart, just remove existing items and add new items</p>
            <p>you can pay with credit, debit cards and also a paypal.</p>
                                        
        </div>
        
        <script>
            // Update cart indicator when document has fully loaded.
            $(document).ready(function(){                                                
                updateCartIndicator();
            });            
        </script>
    </body>
</html>