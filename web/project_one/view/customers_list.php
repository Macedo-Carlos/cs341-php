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
    <div id="message-box" class=""><?php echo $message; ?></div>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1>Customers</h1>
        <p>This is a list of our customers.</p>
        <label for="customerName">Enter customer's name</label>
        <input type="text" name="customerName" id="customerName" placeholder="Search by customer's name">
        <button onclick="searchCustomer()">Search</button>
        <div id="customersListContainer"><?php echo $customersList; $message = "";?></div>
        <a class="formButton" href="index.php?action=newCustomer">Add New Customer</a>
    </main>

    <section id="side-menu">
        <nav>
            <ul>
                <li><a href="index.php?action=home">Open Orders</a></li>
                <li><a href="index.php?action=servicesList">Services</a></li>
                <li><a href="index.php?action=modelsList">Models</a></li>
            </ul>
        </nav>
    </section>

    <footer>
        <hr>
        <p>&copy; Carlos Macedo</p>
        <p>All images used are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.</p>
        <p>Last updated: <?php echo date('jS F, Y', getlastmod()) ?></p>
    </footer>

</body>
</html>