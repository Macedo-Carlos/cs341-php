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
    <div id="message-box" class=""><?php echo $roNumber; ?></div>
    <header>
    <a href="index.php?action=home"><img src="images/site/repair_orders_logo.png" alt="Repair Orders Maganer Logo"></a>
        <a href="index.php?action=home"><h1>Repair Orders Manager</h1></a>
    </header>
    <main>
        <h1>Repair Order <?php echo $roNumber; ?></h1>
        <div id="customerInfo">
        <?php echo $customerInfo; $message = "";?>
        </div>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="roNumber">Repair Order Number</label>
                <input type="number" name="roNumber" id="roNumber" required value=<?php echo $roNumber; ?>>
            </div>
            <div>
                <label for="roDate">Order Date</label>
                <input type="date" name="roDate" id="roDate" required value=<?php echo $roDate; ?>>
            </div>
            <div>
                <label for="modelId">Select the model for repair</label>
                <select name="modelId" id="modelId" required>
                    <?php echo $modelOptions; ?>
                </select>
            </div>
            <div>
                <label for="roModelSn">Motor Serial Number</label>
                <input type="text" name="roModelSn" id="roModelSn" required value="<?php echo $roModelSn; ?>">
            </div>
            <div>
                <label for="roProblem">Describe the problem:</label>
                <textarea name="roProblem" id="roProblem" cols="60" rows="10" required><?php echo $roProblem; ?></textarea>
            </div>
            <div>
                <label for="roStatus">Select the status of the order</label>
                <select name="roStatus" id="roStatus" required>
                    <?php echo $statusOptions; ?>
                </select>
            </div>
            <div>
                <label for="roDiagnosisNotes">Diagnosis and notes:</label>
                <textarea name="roDiagnosisNotes" id="roDiagnosisNotes" cols="60" rows="10" required><?php echo $roDiagnosisNotes; ?></textarea>
            </div>
            <div>
                <label for="serviceId">Select the repair service:</label>
                <select name="serviceId" id="serviceId" required>
                    <?php echo $serviceOptions; ?>
                </select>
            </div>

            <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
            <input type="hidden" name="repairOrderId" value="<?php echo $repairOrderId; ?>">
            <input type="hidden" name="action" value="updateRO">
            <input class="formButton" type="submit" value="Save Changes">
        </form>
        <a class="formButton" href="index.php?action=home">Go Back</a>
    </main>

    <footer>
        <hr>
        <p>&copy; Carlos Macedo</p>
        <p>All images used are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.</p>
        <p>Last updated: <?php echo date('jS F, Y', getlastmod()) ?></p>
    </footer>
    
</body>
</html>