<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/site/repair_orers_logo.svg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/site/favicon.png" type="image/x-icon"/>
    <title>Open Orders | Repair Orders Manager</title>
</head>
<body>
    <div id="message-box" class=""><?php echo $message; ?></div>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1>New Repair Order</h1>
        <div id="customerInfo">
        <?php echo $customerInfo; $message = "";?>
        </div>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="roNumber">Repair Order Number</label>
                <input type="number" name="roNumber" id="roNumber" required>
            </div>
            <div>
                <label for="roDate">Order Date</label>
                <input type="date" name="roDate" id="roDate" required>
            </div>
            <div>
                <label for="modelId">Select the model for repair</label>
                <select name="modelId" id="modelId" required>
                    <?php echo $modelOptions; ?>
                </select>
            </div>
            <div>
                <label for="roModelSn">Motor Serial Number</label>
                <input type="text" name="roModelSn" id="roModelSn" required>
            </div>
            <div>
                <label for="roProblem">Describe the problem:</label>
                <textarea name="roProblem" id="roProblem" cols="30" rows="20" required></textarea>
            </div>
            <input type="hidden" name="roStatus" value="1">
            <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
            <input type="hidden" name="action" value="addNewRo">
            <input class="formButton" type="submit" value="Create New Repair Order">
        </form>
        <a class="formButton" href="index.php?action=customersList">Go Back</a>
    </main>

    <footer>
        <hr>
        <p>&copy; Carlos Macedo</p>
        <p>All images used are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.</p>
        <p>Last updated: <?php echo date('jS F, Y', getlastmod()) ?></p>
    </footer>
    
</body>
</html>