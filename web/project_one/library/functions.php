<?php

// Build the HTML for the scriptures list
function getRepairOrdersList($repairOrders){
    $block = "<table class='lists-table'><tr><th>RO Number</th><th>Order Date</th><th>Customer</th><th>Order Status</th></tr>";
    foreach ($repairOrders as $order) {
        $currentStatus = getStatusDescription($order['rostatus']); 
        $block .= "<tr><td>$order[ronumber]</td><td>$order[rodate]</td><td>$order[customername] $order[customerlastname]</td><td>$currentStatus</td></tr>";
    }
    $block .= '</table>';
    return $block;
}

function scriptureDetails($scriptures){
    $block = '<div>';
    foreach ($scriptures as $scripture) {
        $block .= '<p>';
        $block .= "<span class='scrRef'>$scripture[book] $scripture[chapter]:$scripture[versefrom]</span> - ";
        $block .= "\"<span class='scrCont'>$scripture[content]</span>\"";
        $block .= '</p>';
    }
    $block .= '</div>';
    return $block;
}

function getStatusDescription($statusEnum){
    $status = "";
    switch ($statusEnum){
        case "0":
            $status = "Closed";
        case "1":
            $status = "Order Received";
        case "2":
            $status = "Waiting for Parts";
        case "3":
            $status = "Waiting for Customer";
        case "4":
            $status = "Ready for Pick-Up";
        default:
            $status = "Order Received";
    }
    return $status;
}

?>

