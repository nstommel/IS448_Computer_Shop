<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!--Include Bootstrap 4 CSS and JS with jQuery Ajax-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="javascript/computerShop.js"></script>
        <style>            
        </style>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand font-weight-bold" href="index.php">
                <img src="site-imgs/Logo-Navbar.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Quality Computers
            </a>
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
        <div class="container-fluid float-center" style="margin-top: 75px;">
            <div class="text-center">                        
                <h2><u>About Us</u></h2>
                <img src="site-imgs/computer_store.jpg" class="rounded" alt="Computer Store" height="300">
                <img src="site-imgs/computer-logo.png" class="rounded" alt="Computer Logo" height="300">
                <br /><br />
                <p><em>Based in Columbia, Maryland, we are here for all your computer purchasing needs.</em></p>
                <p>
                    Our online & retail stores offer many laptop & desktop computers for customers.
                    <br />
                    Peripherals and computer accessories are also offered in our retail store.
                    <br />
                    We also offer computer repair & support services.
                </p>
                <h2><u>Help Center</u></h2>
                <p>We offer stellar in-store and phone service.</p>
                <p>
                    Want to chat with a customer service representative?
                    To change & update your order, get purchasing advice, or return a product,
                    <br />
                    Give us a call at <strong>1-800-798-6474</strong>
                    <br />
                    or email us at <strong>qualitycomputers@gmail.com</strong>
                </p>
                <h4><em>Store hours</em></h4>
                <p>To make shopping flexible and fun our online store is open 24/7.</p>
                <p>Our retail location is open Monday-Friday from 9:00AM to 8:00PM.</p>
                <p>(Excluding holidays)</p>
                <h4><em>Payments</em></h4>
                <img src="site-imgs/Payment-Icons.png" class="rounded" alt="Payment Options" width="300" />
                <br /><br />
                <p>We accept Visa, MasterCard, American Express & Discover.</p>
                <P>PayPal Checkout is also supported.</p>
                <h4><em>Store Location</em></h4>
                <p>9092 Snowden River Pkwy, Columbia, MD 21046</p>
                <img src="site-imgs/Map.png" class="rounded" alt="Store Location Map" width="600" />
                <br /><br />
            </div>
        </div>
        <script>
            // Update cart indicator when document has fully loaded.
            $(document).ready(function(){                                                
                updateCartIndicator();
            });            
        </script>
    </body>
</html>