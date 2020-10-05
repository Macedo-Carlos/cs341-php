<?php

// Build a navigation bar using the $categories array
function buildProductsGrid($productsList){
    $productsGrid = '<div class="productsGridContainer">';
    $arrlength = count($productsList);
    
    for ($i = 0; $i < $arrlength; $i++) {
        $productsGrid .= '<div class="productGridItem">';
        $productsGrid .= "<a href='index.php?action=details&itemNumber=$i'><img class='product-image-in-grid' src='".$productsList[$i]['productImageUrl']."' alt='".$productsList[$i]['productName']."'></a>";
        $productsGrid .= "<p class='product-name'>".$productsList[$i]['productName']."</p>";
        $productsGrid .= "<p>SKU ".$productsList[$i]['productSKU']."</p>";
        $productsGrid .= "<p>$".$productsList[$i]['productPrice']."</p>";
        $productsGrid .= "<label for='".$productsList[$i]['productName']."-quantity'>Quantity</label>";
        $productsGrid .= "<input type='number' class='product-quantity-input' id='".$productsList[$i]['productName']."-quantity' name='".$productsList[$i]['productName']."-quantity' min='1' max='10' value='1'>";
        $productsGrid .= "<button class='add-to-cart-button' type='button'>Add to Cart</button>";
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

    $productCard .= "<section class='text-details-section'>";
    $productCard .= "<h2>".$productsList[$i]['productName']."</h2>";
    $productCard .= "<p>SKU ".$productsList[$i]['productSKU']."</p>";
    $productCard .= "<label for='".$productsList[$i]['productName']."-quantity'>Quantity</label>";
    $productCard .= "<input type='number' class='product-quantity-input' id='".$productsList[$i]['productName']."-quantity' name='".$productsList[$i]['productName']."-quantity' min='1' max='10' value='1'>";
    $productCard .= "<button class='add-to-cart-button' type='button'>Add to Cart</button>";
    $productCard .= "<hr>";
    $productCard .= "<p>".$productsList[$i]['productDescription']."</p>";
    $productCard .= '</section>';

    $productCard .= '<div>';
    return $productCard;
}

?>