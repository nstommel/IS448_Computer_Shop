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
            #carousel.carousel.slide {
                width: 100%;
                max-width: 500px;
            }
            /* Bootstrap uses white svg icons for carousels, which are invisible with images on a white background.
               This code adapted from https://stackoverflow.com/questions/49391266/change-bootstrap-4-carousel-control-colors
               essentially redraws the svg arrow icons in black.*/
            .carousel-control-prev-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%2300000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
            }

            .carousel-control-next-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%2300000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
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
                    <li class="nav-index">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="items.php">Shop</a>
                    </li>
                    <li class="nav-brands active">
                        <a class="nav-link" href="brands.php">Brands</a>
                    </li>
                    <li class="nav-about">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <a class="btn btn-light ml-auto mr-2" href="cart.php">Cart (<span id="numCartItems"></span>)</a>
            </div>
        </nav>
        <div class="container-fluid float-left" style="margin-top: 75px;">
            <h3><em>Computer Brands<em></h3>          
              
            <p><em>Our store has many laptops available for our customers<em><p>
                   
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="site-imgs/Dell-Logo.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="site-imgs/Lenovo_logo.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="site-imgs/HP-Logo.jpg" class="d-block w-100" alt="...">
                  </div>
                    <div class="carousel-item">
                        <img src="site-imgs/Asus_logo.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="site-imgs/Apple_logo.png" class="d-block w-100" alt="...">
                    </div>                    
                </div>
               <button class="carousel-control-prev" type="button" data-target="#carousel" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carousel" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
            <h3>Product Information</h3>
            <h4>Brands</h4>  
            <h5>Dell</h5>
            <p>Laptop Computers & 2-in-1 PCs and they can be customised according to your needs and preferences</p>
            <h5>Lenovo</h5> 
            <p>The best Unbeatable keyboard and Solid productivity performance and battery life</p>
            <h5>ASUS</h5>
            <p>The best laptops for unrivalled mobility, featuring lightweight, and toughness</p>
            <h5>HP</h5>
            <p>Hp provides fast, powerful, and easier for consumers to adopt for their personal projects.</p>
            <h5>Samsung</h5>
            <p>Samsung is powerful, offer sufficient battery life, and has an extra oomph that other laptop brands don't over</p>
            <h5>Apple</h5>              
            <p>supercharged by M1 and M2 chips and MacBook is user-friendly</p> 
        </div>
        <script>
            //Update cart indicator when document has fully loaded.
            $(document).ready(function(){                                                
                updateCartIndicator();
                $('.carousel').carousel({
                    interval: 2000
                })
            });            
        </script>
    </body>
</html>