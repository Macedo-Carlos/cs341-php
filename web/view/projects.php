<?php

$pageTitle = "Projects"

?>

<?php include 'common/header.php'; ?>

    <main>
        <section class="commentSideSection">
            <h2>Team Activities</h2>
            <p>Working in teams gives us the opportunity to help each other learn the skills we need in order to succeed.</p>
            <p>It is amazing to me how much less challenging these activities look now that I’ve work through them with my peers.</p>
        </section>

        <section class="imagesSection">
            <figure>
                <a href="team-projects/02Teach/hello.html"><img src="images/activities/hand_emoji.jpg" alt="Hello World Application"></a>
                <figcaption>Week 2 - Hello World!</figcaption>
            </figure>
            <figure>
                <a href="team-projects/03Teach/week3.php"><img src="images/activities/form.jpg" alt="Form Practice Application"></a>
                <figcaption>Week 3 - Forms</figcaption>
            </figure>
            <figure>
                <a href="team-projects/05Teach/index.php?action=home"><img src="images/activities/database-w-arrow.jpg" alt="Database Practice Application"></a>
                <figcaption>Week 3 - Forms</figcaption>
            </figure>
        </section>

        <section class="commentSideSection">
            <h2>Individual Assignments</h2>
            <p>By trying to figure out how to accomplish these tasks on my own, I will be able to identify the gaps in my knowledge and topics where I need to study new concepts.</p>
            <p>Even though these are individual assignments, I know I can count on my classmates, instructors, Tas, and tutors to get me over the bump if I get stuck; and that’s what one of the things I love the most about BYU-I.</p>
        </section>

        <section class="imagesSection">
            <figure>
                <a href="index.php?action=home"><img src="images/activities/home.jpg" alt="Home Page"></a>
                <figcaption>Week 2 - Home Page</figcaption>
            </figure>
            <figure>
                <a href="shoping-cart/index.php"><img src="images/activities/cart.jpg" alt="Shoping Cart Application"></a>
                <figcaption>Week 3 - Shoping Cart</figcaption>
            </figure>
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