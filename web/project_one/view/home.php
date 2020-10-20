<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Home | Scripture References</title>
</head>
<body>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1><?php echo $message; ?></h1>
        <p>This is a list of the open repair orders.</p>
        <?php echo $repairOrdersList; $message = "";?>
        <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="search-view">
        <?php if ($showButton){ echo "<a href='index.php?action=home' class='formButton'>Go Back</a>"; } ?>
        <button class="formButton" type="submit">Search Orders</button>
    </form>
    </main>
</body>
</html>