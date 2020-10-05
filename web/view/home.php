<?php

$pageTitle = "Home Page"

?>

<?php include 'common/header.php'; ?>


    <main>
        <section class="introductionSection">
        <h2>Introduction</h2>
        <p>When I was very young, one day my mom came to me with some paper and she folded one piece into a flapping bird and then she folded another piece into a jumping frog. Then she gave me an origami book and she told me that I could make any toy I wanted out of paper; her words blew my mind. I've been folding paper into origami ever since and I love it.</p>
        <p>I think coding can be like origami in a lot of ways. There is a special language to communicate instructions that need to be followed in order to make an origami model. That's why I like coding too. Take a look at my projects for this semester.</p>
        <a class="regularButton" href="index.php?action=projects">CSE 341 Projects</a>
        </section>
        <section class="imagesSection">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-yoda.JPG" alt="Yoda">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-star-wars-battle.JPG" alt="Star Wars Battle">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-star-wars.JPG" alt="Star Wars Characters">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-turtles.JPG" alt="Turtles">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-dogs.JPG" alt="Dogs">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-cows.JPG" alt="Cows">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-halloween.JPG" alt="Haloween Cats and Skull">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-dragon.JPG" alt="Dragon">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-heart.JPG" alt="Heart">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-rose.JPG" alt="Rose">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-koi.JPG" alt="Koi Fish">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-koi-fish.JPG" alt="Koi Fish Framed">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-snoopy.jpg" alt="Snoopy Framed">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-panda.JPG" alt="Panda">
            <img onclick="modalOnClick(this)" class="modalImage" src="images/origami-models/origami-bouque.JPG" alt="Floran Arrangement">
        </section>
    </main>
        <!-- Modal Conatiner -->
    <div id="modal01" class="modal" onclick="this.style.display='none'">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">

        <!-- Modal Caption (Image Text) -->
        <div id="modal-caption"></div>

    </div>

    <?php include 'common/footer.php'; ?>