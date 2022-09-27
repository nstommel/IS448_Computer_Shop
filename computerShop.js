// This file contains the necessary javascript functions for the site.

function updateCartIndicator() {
    console.log('updating number of cart items indicator');                
    // Disable update button for brief period during ajax request
    $("#update").prop("disabled", true);
    $.ajax({
        method: "POST",
        url: "getNumCartItems.php",                    
        dataType: "text",
        cache: false
    }).done(function(data, textStatus, jqXHR) {
        console.log("Status: " + textStatus);
        console.log("Num items in cart=" + data);
        $("#numCartItems").text(data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });
}

function addItemToCart(itemSKU) {
    console.log('update initiated');
    console.log('item SKU=' + itemSKU);
    $.ajax({    
        method: "POST",
        url: "addToCart.php",
        data: "itemSKU=" + itemSKU,
        dataType: "text",
        cache: false
    //Use jQuery done and fail deferred/promise methods called using 
    //anonymous function callbacks with chaining.
    }).done(function(data, textStatus, jqXHR) {
        console.log("Cart insertion status: " + textStatus);
        console.log(data);
        updateCartIndicator();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Cart insertion status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });
}

function showCart(orderPlaced = false) {
    //Note that $ is short for "jQuery" function, here we call
    //ajax function object to perform AJAX request.
    console.log("retrieving cart contents...\n");    
    $.ajax({    
        method: "POST",
        url: "showCart.php",             
        dataType: "html",
        data: "orderPlaced=" + orderPlaced.toString(),
        cache: false        
    //Use jQuery done and fail deferred/promise methods called using 
    //anonymous function callbacks with chaining.
    }).done(function(data, textStatus, jqXHR) {
        console.log("Cart retrieval status: " + textStatus);
        //Uncomment to see raw HTML returned
        //console.log(data);
        //console.log(jqXHR.responseText);
        //Insert html into tableContainer div
        $("#cart").html(data);
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Cart retrieval status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });
}
            
function placeOrder() {
    console.log('update initiated');
    // Disable update button for brief period during ajax request
    $("#update").prop("disabled", true);
    // View serialized form contents (Note that characters
    // [ and ] must be unescaped from their HTML coded forms)
    console.log(unescape($("#cartForm").serialize()));
    $.ajax({    
        method: "POST",
        url: "placeOrder.php",
        dataType: "text",
        data: $("#cartForm").serialize() + "&placeOrder=true",
        cache: false
    //Use jQuery done and fail deferred/promise methods called using 
    //anonymous function callbacks with chaining.
    }).done(function(data, textStatus, jqXHR) {
        console.log("Place order status: " + textStatus);                    
        console.log(data);
        // Only retrieve cart form and update indicator until after ajax request 
        // is complete.Avoids executing showCart before ajax request is complete
        // and retrieving outdated data.
        $.ajax({
            method: "POST",
            url: "clearCart.php",                    
            dataType: "text",
            cache: false
        }).done(function(data, textStatus, jqXHR) {
            console.log("Status: " + textStatus);
            console.log(data);
            // After cart is cleared, show message for a successfully placed
            // order and update the cart indicator. These operations do not
            // depend on each other an can be executed in any order.
            showCart(true);
            updateCartIndicator();
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("Status: " + textStatus);
            console.log("Response text: " + jqXHR.responseText);
            console.log("Error thrown: " + errorThrown);
            alert(jqXHR.responseText);
        });       
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Place order status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });        
}

function updateCart() {
    console.log('update initiated');
    // Disable update button for brief period during ajax request
    $("#update").prop("disabled", true);
    // View serialized form contents (Note that characters
    // [ and ] must be unescaped from their HTML coded forms)
    console.log(unescape($("#cartForm").serialize()));
    $.ajax({    
        method: "POST",
        url: "updateCart.php",
        dataType: "text",
        data: $("#cartForm").serialize(),
        cache: false
    //Use jQuery done and fail deferred/promise methods called using 
    //anonymous function callbacks with chaining.
    }).done(function(data, textStatus, jqXHR) {
        console.log("Cart update status: " + textStatus);                    
        console.log(data);
        // Only retrieve cart form until after ajax request is complete.
        // Avoids executing showCart before ajax request is complete
        // and retrieving outdated data.
        showCart();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Cart update status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });                
}

function removeItem(itemSKU) {
    console.log('remove initiated');
    console.log('item SKU=' + itemSKU);
    // Disable update button for brief period during ajax request
    $("#update").prop("disabled", true);
    $.ajax({    
        method: "POST",
        url: "removeFromCart.php",
        data: "itemSKU=" + itemSKU,
        dataType: "text",
        cache: false
    }).done(function(data, textStatus, jqXHR) {
        console.log("Cart deletion status: " + textStatus);
        console.log(data);
        // Only retrieve cart form until after ajax request is complete.
        // Avoids executing showCart before ajax request is complete 
        // and retrieving outdated data.
        showCart();
        updateCartIndicator();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Cart deletion status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });
}

function clearCart() {
    console.log('updating number of cart items indicator');                
    // Disable update button for brief period during ajax request
    $("#update").prop("disabled", true);
    $.ajax({
        method: "POST",
        url: "clearCart.php",                    
        dataType: "text",
        cache: false
    }).done(function(data, textStatus, jqXHR) {
        console.log("Status: " + textStatus);
        console.log(data);
        showCart();
        updateCartIndicator();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log("Status: " + textStatus);
        console.log("Response text: " + jqXHR.responseText);
        console.log("Error thrown: " + errorThrown);
        alert(jqXHR.responseText);
    });
}
