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

function getCustomersList($customers){
    $block = "<table class='lists-table'>
                <tr><th>Customer Name</th><th>Customer Phone</th><th></th></tr>";
    foreach ($customers as $customer) {
        $currentStatus = getStatusDescription($order['rostatus']); 
        $block .= "<tr><td>$customer[full_name]</td><td>$customer[customerphone]</td><td>$customer[id]</td></tr>";
    }
    $block .= '</table>';
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

