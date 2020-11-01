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
        <h1>New Repair Order</h1>
        <div id="customerInfo">
        <?php echo $customerInfo; $message = "";?>
        </div>
        <form action="index.php?addNewRo" method="POST" enctype="multipart/form-data">
            <div>
                <label for="roNumber">Repair Order Number</label>
                <input type="text" name="roNumber" id="roNumber">
            </div>
            <div>
                <label for="roDate">Order Date</label>
                <input type="date" name="roDate" id="roDate">
            </div>
            <div>
                <label for="roModel">Select the model for repair</label>
                <select name="roModel" id="roModel">
                    <?php echo $modelOptions; ?>
                </select>
            </div>
            <div>
                <label for="motorSn">Motor Serial Number</label>
                <input type="text" name="motorSn" id="motorSn">
            </div>
            <div>
                <label for="roProblem">Decribe the problem:</label>
                <textarea name="roProblem" id="roProblem" cols="30" rows="20"></textarea>
            </div>
            <div>
                <label for="roDiagnosis">Diagnosis and Notes</label>
                <textarea name="roDiagnosis" id="roDiagnosis" cols="30" rows="20"></textarea>
            </div>
            <div>
                <label for="serviceId">Select the service to be performed:</label>
                <select name="serviceId" id="serviceId">
                    <?php echo $serviceOptions; ?>
                </select>
            </div>
            <input type="hidden" name="status" value="1">
            <input type="hidden" name="type" value="1">
            <input type="hidden" name="customerId" value="<?php echo $customerId; ?>">
            <?php if ($showButton){ echo "<a href='index.php?action=home' class='formButton'>Go Back</a>"; } ?>
            <input class="formButton" type="submit" value="Create New Repair Order">
        </form>
    </main>
</body>
</html>