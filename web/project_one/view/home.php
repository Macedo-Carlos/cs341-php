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
    <div id="message-box" class=""><span class="message-span"><?php echo $message; ?></span></div>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1><?php echo $message; ?></h1>
        <h1>View Open Repair Orders</h1>
        <p>This is a list of the repair orders that we have to work on.</p>
        <?php echo $repairOrdersList; $message = "";?>
    </main>
    
    <section id="side-menu">
        <nav>
            <ul>
                <li><a href="index.php?action=customersList">Customers</a></li>
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