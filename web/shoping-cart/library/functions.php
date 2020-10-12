<?php

// Build a navigation bar using the $categories array
function buildProductsGrid($productsList){
    $productsGrid = '<div class="productsGridContainer">';
    $arrlength = count($productsList);
    
    for ($i = 0; $i < $arrlength; $i++) {
        $qtyId = $productsList[$i]['productName']."-quantity";
        $productsGrid .= '<div class="productGridItem">';
        $productsGrid .= "<a href='index.php?action=details&itemNumber=$i'><img class='product-image-in-grid' src='".$productsList[$i]['productImageUrl']."' alt='".$productsList[$i]['productName']."'></a>";
        $productsGrid .= "<p class='product-name'>".$productsList[$i]['productName']."</p>";
        $productsGrid .= "<p>SKU ".$productsList[$i]['productSKU']."</p>";
        $productsGrid .= "<p>$".$productsList[$i]['productPrice']."</p>";
        $productsGrid .= "<label for='".$productsList[$i]['productName']."-quantity'>Quantity</label>";
        $productsGrid .= "<input type='number' class='product-quantity-input' id='".$productsList[$i]['productName']."-quantity' name='".$productsList[$i]['productName']."-quantity' min='1' max='10' value='1'>";
        $productsGrid .= "<button class='add-to-cart-button' onclick=ajaxPost('$i','$qtyId','addToCart')>Add to Cart</button>";
        $productsGrid .= '</div>';
    }
    $productsGrid .= '<div>';
    return $productsGrid;
}

function buildProductsDetails($productsList, $itemNumber){
    $productCard = '<div class="productCardContainer">';
    $i = $itemNumber;
    
    $productCard .= '<section>';
    $productCard .= "<img src='".$productsList[$i]['productImageUrl']."' alt='".$productsList[$i]['productName']."'>";
    $productCard .= '</section>';

    $qtyId = $productsList[$i]['productName']."-quantity";
    $productCard .= "<section class='text-details-section'>";
    $productCard .= "<h2>".$productsList[$i]['productName']."</h2>";
    $productCard .= "<p>SKU ".$productsList[$i]['productSKU']."</p>";
    $productCard .= "<label for='".$productsList[$i]['productName']."-quantity'>Quantity</label>";
    $productCard .= "<input type='number' class='product-quantity-input' id='".$productsList[$i]['productName']."-quantity' name='".$productsList[$i]['productName']."-quantity' min='1' max='10' value='1'>";
    $productCard .= "<button class='add-to-cart-button' onclick=saveToLocalStorage('$i','$qtyId')>Add to Cart</button>";
    $productCard .= "<hr>";
    $productCard .= "<p>".$productsList[$i]['productDescription']."</p>";
    $productCard .= '</section>';

    $productCard .= '<div>';
    return $productCard;
}

function buildCartGrid($productList, $cartList){
    $subTotal = 0;
    $cartTotal = 0;
    $cartGrid = "<table id='cart-table'><tr><th></th><th>Item</th><th>Qty</th><th>Subtotal</th></tr>";
    foreach ($cartList as $key => $value){
        $price = $productList[$key]['productPrice'];
        $subTotal = $value * $price;
        $cartTotal += $subTotal;
        $productUrl = $productList[$key]['productImageUrl'];
        $productName = $productList[$key]['productName'];
        $productSku = $productList[$key]['productSKU'];
        $qtySpanId = $productList[$key]['productName'] . "-qty-span";
        $subtotalSpanId = $productList[$key]['productName'] . "-subtotal-span";
        $itemPrice = $productList[$key]['productPrice'];
        $lineId = $productList[$key]['productName'] . "-item-line";
        $cartGrid .= "<tr id='$lineId'><td class='cart-image-cell'><img class='cart-image' src='$productUrl' alt='$productName Thumbnail'></td><td><p class='name-label'>$productName</p><p class='sku-label'>SKU $productSku</p></td><td class='qty-cell'><img class='qty-adjust-button' src='images/site/minus_button.svg' alt='Minus Button' onclick=adjustItemQuantity('$qtySpanId','-1','$itemPrice','$subtotalSpanId','$lineId','$key')>  <span id='$qtySpanId'>$value</span> ea  <img class='qty-adjust-button' src='images/site/plus_button.svg' alt='Plus Button' onclick=adjustItemQuantity('$qtySpanId','1','$itemPrice','$subtotalSpanId','$lineId','$key')></td><td class='qty-subtotal-cell'>$<span id='$subtotalSpanId'>$subTotal</span></td></tr>";
    }
    $cartGrid .= "<tr><td></td><td></td><td class='total-label-cell'>Total</td><td class='qty-subtotal-cell total-cell'>$<span id='cart-total'>$cartTotal</span></td></tr>";
    $cartGrid .= "</table>";
    $cartGrid .= "<div id='buttons-line'><a href='index.php' class='add-to-cart-button'>Continue Shopping</a><a href='index.php?action=checkout' class='add-to-cart-button'>Check Out</a></div>";
    
    return $cartGrid;
}

?>