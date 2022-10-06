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
/*            #carousel.carousel.slide {
                width: 50%;
                max-width: 400px;
            }*/
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
               // <a class="btn btn-light ml-auto mr-2" href="cart.php">Cart (<span id="numCartItems"></span>)</a>
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
                </div>
               <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
            </div>
                        <p>Brands<p>  
                       <p>Dell<p>
                          </p>Lenovo</p> 
                         </p>ASUS</p>
                   </p>HP</p>
                    
                 </p>Samsung</p>
               </p>Apple</p>              
                                     
        </div>
        <script>
            // Update cart indicator when document has fully loaded.
           // $(document).ready(function(){                                                
            //    updateCartIndicator();
           // });            
        </script>
    </body>
</html>