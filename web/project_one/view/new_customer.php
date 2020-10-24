<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/site/repair_orers_logo.svg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/styles.css">
    <title>Open Orders | Repair Orders Manager</title>
</head>
<body>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1><?php echo $message; ?></h1>
        <h1>Add New Customer</h1>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <p>All the information is required in order to update an account.</p>
            <div>
                <label class="required" for="customername">Fist Name</label>
                <input type="text" id="customername" placeholder="First Name" name="customername" required>
            </div>
            <div>
                <label class="required" for="customerlastname">Last Name</label>
                <input type="text" id="customerlastname" placeholder="Last Name" name="customerlastname" required>
            </div>
            <div>
                <label class="required" for="customerphone" >Phone Number</label>
                <input type="text" id="customerphone" name="customerphone" placeholder="123-456-7890" required>
            </div>
            <div>
                <label class="required" for="customeraddress" >Address</label>
                <textarea id="customeraddress" name="customeraddress" rows="4" cols="50" placeholder="Enter customer's address..."></textarea>
            </div>
            <p>Please check to make sure that all the information you provided is correct.</p>
            <button class="formButton" type="submit">Add New Customer</button>
            <input type="hidden" name="action" value="addNewCustomer">
        </form>
        <a class="formButton" href="index.php?customerList">Go Back</a>
    </main>

</body>
</html>