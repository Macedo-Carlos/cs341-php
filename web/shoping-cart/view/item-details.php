<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js" async></script>
    <title>Product Details | Fake Fruit</title>
</head>
<body>
    <header>
        <a class="cart-icon" href="index.php?action=cart"><img src="images/site/shopping_cart.svg" alt="Shopping Cart"></a>
        <a href="index.php?action=home"><img id="page-logo"src="images/site/fake_fruit_logo_upper_f.png" alt="Fake Fruit Logo"></a>
        <div id="page-banner">Ceramic Fruit For All Collectors | Est. 1965</div>
    </header>
    <main>
        <?php echo $productsDetails; ?>
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