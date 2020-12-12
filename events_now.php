<!DOCTYPE html>
    <?php
        include('templates/header_public.html');
    ?>
        <br>
        <h1>EVENTS NOW</h1>

        <?php require_once('database/events.php'); ?>
        
        <img src="images/CookingWorkshop.jpg" alt="Cooking Workshop">
        <h2>
            <a href="event_details.php">Cooking Workshop</a>
        </h2>
        <p>
            23rd December 2020<br>
            Berlin, Germany<br>
            10-15€
        </p>

        <img src="images/websummit.jpeg" alt="Web Summit">
        <h2>
            <a>Web Summit</a>
        </h2>
        <p>
            2-5 December 2020<br>
            Online<br>
            5-20.000€
        </p>

        <img src="images/TedTalk.webp" alt="Ted Talk">
        <h2>
            <a>TED Talk</a>
        </h2>
        <p>
            20th December 2020<br>
            Porto, Portugal<br>
            0€
        </p>
    <?php
        include('templates/footer.html');
    ?>