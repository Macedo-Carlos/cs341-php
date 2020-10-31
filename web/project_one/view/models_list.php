<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/site/repair_orers_logo.svg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/styles.css">
    <title>Models | Repair Orders Manager</title>
</head>
<body>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1><?php echo $message; ?></h1>
        <h1>View Models</h1>
        <p>This is a list of the motor models we repair.</p>
        <?php echo $modelsGrid; $message = "";?>
    </main>
    
    <section class="side">
        <nav>
            <ul>
                <li><a href="index.php?action=home">Open Repairs</a></li>
                <li><a href="index.php?action=customersList">Customers</a></li>
                <li><a href="#">Services</a></li>
            </ul>
        </nav>
    </section>
</body>
</html>