<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js" async></script>
    <title>Cart | Fake Fruit</title>
</head>
<body>
    <header>
        <a href="index.php?action=home"><img id="page-logo"src="images/site/cornucopia_logo2.png" alt="Fake Fruit Logo"></a>
        <div id="page-banner">Realistically Ceramic Fruit For All Collectors</div>
    </header>
    <main>
        <?php echo $cartGrid; ?>
    </main>
    <div id="statusElement"></div>
    <footer>
        <hr>
        <p>&copy; Carlos Macedo</p>
        <p>All images used are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.</p>
        <p>Last updated: <?php echo date('jS F, Y', getlastmod()) ?></p>
    </footer>
</body>
</html>