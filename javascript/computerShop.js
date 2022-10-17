// This file contains the necessary javascript functions for the site.
function showItems() {
    //Note that $ is short for "jQuery" function, here we call
    //ajax function object to perform AJAX request.
    $.ajax({    
        method: "POST",
        url: "php-ajax/showItemsCards.php",             
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

function updateCartIndicator() {
    console.log('updating number of cart items indicator');    
    $.ajax({
        method: "POST",
        url: "php-ajax/getNumCartItems.php",                    
        dataType: "text",
        cache: false
    //Use jQuery done and fail deferred/promise methods called using 
    //anonymous function callbacks with chaining.
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
        url: "php-ajax/addToCart.php",
        data: "itemSKU=" + itemSKU,
        dataType: "text",
        cache: false    
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
        url: "php-ajax/showCart.php",             
        dataType: "html",
        data: "orderPlaced=" + orderPlaced.toString(),
        cache: false            
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
    // Disable buttons for brief period during ajax request
    $("#update").prop("disabled", true);
    $("#clear").prop("disabled", true);
    $("#place").prop("disabled", true);
    $(".removeButton").prop("disabled", true);
    // View serialized form contents (Note that characters
    // [ and ] must be unescaped from their HTML coded forms)
    console.log(unescape($("#cartForm").serialize()));
    $.ajax({    
        method: "POST",
        url: "php-ajax/placeOrder.php",
        dataType: "text",
        data: $("#cartForm").serialize() + "&placeOrder=true",
        cache: false    
    }).done(function(data, textStatus, jqXHR) {
        console.log("Place order status: " + textStatus);                    
        console.log(data);
        // Only clear cart, show message, and update indicator until after ajax request 
        // is complete. Avoids executing showCart before ajax request is complete
        // and retrieving outdated data.
        $.ajax({
            method: "POST",
            url: "php-ajax/clearCart.php",                    
            dataType: "text",
            cache: false
        }).done(function(data, textStatus, jqXHR) {
            console.log("Clear cart status: " + textStatus);
            console.log(data);
            // After cart is cleared, show message for a successfully placed
            // order and update the cart indicator. These asynchronous operations 
            // do not depend on each other and can be executed in any order.
            showCart(true);
            updateCartIndicator();
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log("Clear cart status: " + textStatus);
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
    // Disable buttons for brief period during ajax request
    $("#update").prop("disabled", true);
    $("#clear").prop("disabled", true);
    $("#place").prop("disabled", true);
    $(".removeButton").prop("disabled", true);
    // View serialized form contents (Note that characters
    // [ and ] must be unescaped from their HTML coded forms)
    console.log(unescape($("#cartForm").serialize()));
    $.ajax({    
        method: "POST",
        url: "php-ajax/updateCart.php",
        dataType: "text",
        data: $("#cartForm").serialize(),
        cache: false    
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
    // Disable buttons for brief period during ajax request
    $("#update").prop("disabled", true);
    $("#clear").prop("disabled", true);
    $("#place").prop("disabled", true);
    $(".removeButton").prop("disabled", true);
    $.ajax({    
        method: "POST",
        url: "php-ajax/removeFromCart.php",
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
    // Disable buttons for brief period during ajax request
    $("#update").prop("disabled", true);
    $("#clear").prop("disabled", true);
    $("#place").prop("disabled", true);
    $(".removeButton").prop("disabled", true);
    $.ajax({
        method: "POST",
        url: "php-ajax/clearCart.php",                    
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

function clearSearchInput() {
    console.log("Clearing search input box...");
    $("#searchInput").val("");
}