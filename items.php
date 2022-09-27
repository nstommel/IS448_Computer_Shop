<!DOCTYPE html>
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
                    <label for="orderByItem">Select order to display results:</label>
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
                <div class ="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Refresh Display" />
                </div>
            </form>            
        </div>
        <div id="items"></div>
        <script>            
            $(document).ready(function(){                                
                showItems();
                updateCartIndicator();
            }); 
            function showItems() {
                //Note that $ is short for "jQuery" function, here we call
                //ajax function object to perform AJAX request.
                $.ajax({    
                    method: "POST",
                    url: "showItemsCards.php",             
                    dataType: "html",
                    data: $("#itemOrderBy").serialize(),
                    cache: false
                //Use jQuery done and fail deferred/promise methods called using 
                //anonymous function callbacks with chaining.
                }).done(function(data, textStatus, jqXHR) {
                    console.log("Record retrieval status: " + textStatus);
                    //Uncomment to see raw HTML returned
                    //console.log(data);
                    //console.log(jqXHR.responseText);
                    //Insert html into tableContainer div
                    $("#items").html(data);
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    console.log("Record retrieval status: " + textStatus);
                    console.log("Response text: " + jqXHR.responseText);
                    console.log("Error thrown: " + errorThrown);
                    alert(jqXHR.responseText);
                });
            }
        </script>
    </body>
</html>