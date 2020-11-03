<?php

// Build the HTML for the scriptures list
function getRepairOrdersList($repairOrders){
    $block = "<table class='lists-table'><tr><th>RO Number</th><th>Order Date</th><th>Customer</th><th>Order Status</th></tr>";
    foreach ($repairOrders as $order) {
        $currentStatus = getStatusDescription($order['rostatus']);
        $orderId = $order['id'];
        $block .= "<tr onclick=window.location='index.php?action=viewRepairOrder&repairOrderId=$orderId';><td>$order[ronumber]</td><td>$order[rodate]</td><td>$order[customername] $order[customerlastname]</td><td>$currentStatus</td></tr>";
    }
    $block .= '</table>';
    return $block;
}

function getCustomersList($customers){
    $block = "<table class='lists-table'>
                <tr><th>Customer Name</th><th>Customer Phone</th><th></th></tr>";
    foreach ($customers as $customer) {
        $block .= "<tr><td>$customer[full_name]</td><td>$customer[customerphone]</td><td><a href='index.php?action=newRo&customerId=$customer[id]'>New Repair Order</a></td></tr>";
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

function getModelsGrid($models){
    $block = '<div class=gridContainer>';
    foreach($models as $model){
        $block .= "
        <div class=gridItem>
            <h3>$model[modelname]</h3>
            <img src='$model[modelimage]' alt='$model[modelname]'>
            <p>$model[modeldescription]</p>
        </div>
        ";
    }
    $block .= '</div>';
    return $block;
}

function getServicesList($services){
    $block = '<div class=services-container>';
    foreach($services as $service){
        $block .= "
        <div class=service-item>
            <h3>$service[servicename]</h3>
            <p>$service[servicedescription]</p>
            <p>$$service[serviceprice]</p>
        </div>
        ";
    }
    $block .= '</div>';
    return $block;
}

function getCustomerInfo($customer){
    $block = "";
    foreach($customer as $data){
        $block = "<div class='customerInfo'>
                <p>For customer: $data[full_name]</p>
                <p>Phone: $data[customerphone]</p>
                <p>Address: $data[customeraddress]</p>
                </div>
        ";
    }
    return $block;
}

function getModelOptions($models){
    $block = "";
    foreach($models as $model){
        $block .= "<option value=$model[id]>$model[modelname]</option>";
    }
    return $block;
}

function getModelOptionsAndSelected($models, $selected){
    $block = "";
    foreach($models as $model){
        $block .= "<option value=$model[id] ";
        if($model['id'] == $selected){ $block .= "selected"; }
        $block .= ">$model[modelname]</option>";
    }
    return $block;
}

function getServiceOptions($services){
    $block = "";
    foreach($services as $service){
        $block .= "<option value=$service[id]>$service[servicename]</option>";
    }
    return $block;
}

?>



