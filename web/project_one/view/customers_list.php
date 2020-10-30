<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/site/repair_orers_logo.svg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
    <title>Customers | Repair Orders Manager</title>
</head>
<body>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1><?php echo $message; ?></h1>
        <h1>Customers</h1>
        <p>This is a list of our customers.</p>
        <form id="customerSearch">
            <div>
                <label for="customerSearchBox">Enter customer's name</label>
                <input type="text" name="customerSearchBox" id="customerSearchBox" placeholder="Search by customer's name">
                <input class="formButton" type="submit" value="Search">
            </div>
        </form>
        <div id="customersListContainer"><?php echo $customersList; $message = "";?></div>
        <a class="formButton" href="index.php?action=newCustomer">Add New Customer</a>
    </main>

    <section class="side">
        <nav>
            <ul>
                <li><a href="index.php?action=home">Open Orders</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Models</a></li>
            </ul>
        </nav>
    </section>

</body>
</html>