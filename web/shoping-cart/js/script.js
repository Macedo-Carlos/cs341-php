/* var removeCartItemButtons = document.getElementsByClassName('remove-item-button')
for (var i=0; i < removeCartItemButtons.length; i++) {
    var button = removeCartItemButtons[i]
    button.addEventListener('click', function(event){
        var buttonClicked = event.target
        buttonClicked.parentElement.parentElement.remove()
    })
}

function updateCartTotal() {
    
} */

/* // XMLHttp request to PHP page in the server
function ajaxPost(){
    if (localStorage.getItem("cart") === null) {
        alert("Add items to your cart")
    }   else {
        //Create XMLHttpRequest object
        var serverRequest = new XMLHttpRequest;
        //Collect the variables that will be send to the PHP file
        var url = "responder.php";
        var dataString = "cartContent=" + localStorage.getItem('cart');
        //Open the connection
        serverRequest.open("POST", url, true);
        //Set content type header information
        serverRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Access the onreadystatechange event of the server request object
        serverRequest.onreadystatechange = function(){
            if(serverRequest.readyState == 4 && serverRequest.status == 200) {
                var returnData = serverRequest.responseText;
                document.getElementById("statusElement").innerHTML = returnData;
            }
        }
        //Send the request to the server and wait for the response
        serverRequest.send(dataString);
        document.getElementById("statusElement").innerHTML = "processing server request..."
    }
} */

// XMLHttp request to PHP cart-model page in the server
function ajaxPost(itemIdentifier, qtyContainerId, action){
    //Create XMLHttpRequest object
    var serverRequest = new XMLHttpRequest;
    //Collect the variables that will be send to the PHP file
    var url = "model/cart-model.php";
    var $itemName = itemIdentifier;
    var $itemQuantity = document.getElementById(qtyContainerId).value;
    var $cartAction = action;
    var dataString = "itemName=" + $itemName + "&itemQuantity=" + $itemQuantity + "&cartAction=" + $cartAction;
    //Open the connection
    serverRequest.open("POST", url, true);
    //Set content type header information
    serverRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Access the onreadystatechange event of the server request object
    serverRequest.onreadystatechange = function(){
        if(serverRequest.readyState == 4 && serverRequest.status == 200) {
            var returnData = serverRequest.responseText;
            document.getElementById('statusElement').innerHTML = returnData;
        }
    }
    //Send the request to the server and wait for the response
    serverRequest.send(dataString);
    document.getElementById("statusElement").innerHTML = "processing server request..."

    return returnData;
}

function ajaxPostToCart(itemIdentifier, qtyAdjustedBy, action){
    //Create XMLHttpRequest object
    var serverRequest = new XMLHttpRequest;
    //Collect the variables that will be send to the PHP file
    var url = "model/cart-model.php";
    var $itemName = itemIdentifier;
    var $itemQuantity = qtyAdjustedBy;
    var $cartAction = action;
    var dataString = "itemName=" + $itemName + "&itemQuantity=" + $itemQuantity + "&cartAction=" + $cartAction;
    var returnData = "";
    //Open the connection
    serverRequest.open("POST", url, true);
    //Set content type header information
    serverRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Access the onreadystatechange event of the server request object
    serverRequest.onreadystatechange = function(){
        if(serverRequest.readyState == 4 && serverRequest.status == 200) {
            returnData = serverRequest.responseText;
            document.getElementById('cart-total').innerHTML = returnData;
            if (returnData == '0'){document.getElementById('checkout-button').remove()};
        }
    }
    //Send the request to the server and wait for the response
    serverRequest.send(dataString);
    document.getElementById("cart-total").innerHTML = "Calculating";
}

function adjustItemQuantity(qtySpanId, adjustQty, itemPrice, subtotalSpanId,lineId, itemIdentifier){
    var itemQty = parseInt(document.getElementById(qtySpanId).innerHTML);
    var adjustedItemQty = parseInt(adjustQty) + itemQty;
    var adjustedSubtotal = adjustedItemQty * parseInt(itemPrice);
    var response = "";
    if (adjustedItemQty <= 0) {
        document.getElementById(qtySpanId).innerHTML = adjustedItemQty;
        document.getElementById(subtotalSpanId).innerHTML = adjustedSubtotal;
        response = ajaxPostToCart(itemIdentifier,'0','adjustCart');
        document.getElementById('cart-total').innerHTML = response;
        var lineItem = document.getElementById(lineId);
        lineItem.remove();
    } else {
        document.getElementById(qtySpanId).innerHTML = adjustedItemQty;
        document.getElementById(subtotalSpanId).innerHTML = adjustedSubtotal;
        response = ajaxPostToCart(itemIdentifier,adjustQty,'adjustCart');
        console.log(response);
        document.getElementById('cart-total').innerHTML = response;
    }
}

// Build and update the cart information in the local storage
function saveToLocalStorage(itemName, itemQuantity) {
    //Get the values from the input elements
    var item = itemName;
    var qty = parseInt(document.getElementById(itemQuantity).value);
    //Check to make sure the quantity is at least 1
    if (qty < 1) {
        alert('Enter at least 1');
        return;
    }
    //Check to see if the cart key already exist in the local storage
    if (localStorage.getItem("cart") === null) {
        var newString = '{"' + item + '":' + qty + '}';
        localStorage.setItem("cart", newString);
    }   else {
        //Get the values of the cart key in local storage and put them into a JSON object
        var obj = JSON.parse(localStorage.getItem("cart"));
        //Check to see if the item already exist in the JSON object from the cart key in local storage
        if (obj[item] != undefined) {
            //Update the quantity of the item in the JSON object and update the cart in local storage
            newQty = obj[item];
            newQty += qty;
            obj[item] = newQty;
            localStorage.setItem("cart", JSON.stringify(obj));
        }   else {
            //Add new item to the cart
            obj[item] = qty;
            localStorage.setItem("cart", JSON.stringify(obj));
        }
    }
}

//Erase the cart information from the local storage
function removeCart() {
    // Check to see if the cart exists in the local storage
    if (localStorage.getItem('cart') === null) {
        alert('Item does not exist');
    } else {
        localStorage.removeItem('cart');
        alert('Item removed');
    }

}

//Display the cart values stored as JSON in the local storage
function testJson() {
    var obj = JSON.parse(localStorage.getItem("cart"));
    var txt = "";
    var x;
    for (x in obj) {
        txt += x + " " + obj[x] + " ";
    }
    alert(txt);
}

//Remove individual items from the cart values stored in local storage using JSON to update the string
function removeItem(itemName) {
    //Check to see if the cart exist in local storage
    if (localStorage.getItem("cart") === null) {
        alert('There are no items in the cart');
    }   else {
        //Get the item value from the input element
        var item = document.getElementById(itemName).value;
        //Get the values of the cart key in local storage and put them into a JSON object
        var obj = JSON.parse(localStorage.getItem("cart"));
        //Check to see if the item exist in the JSON object
        if (obj[item] != undefined) {
            //Update the quantity of the item in the JSON object and update the cart in local storage
            obj[item] = 0;
            localStorage.setItem('cart', JSON.stringify(obj));
            alert("Qty 0");
        }   else {
            alert('This item is not in the cart');
        }
    }
}