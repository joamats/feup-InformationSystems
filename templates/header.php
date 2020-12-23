<!DOCTYPE html>
    </head>

    <body>
        <header>
            <nav class="header">
                <a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
                <?php if ($_SESSION['roleUserLoggedIn'] == false ) { ?>
                <a class="actions" id = "buttonLogin" href="login.php">Login</a>
                <a class="actions" href="registration.php?role=Organizer">Become an Organizer</a>
                
                <?php } else { ?>
                <a class="actions" id = "buttonLogout" href="action_logout.php">Logout</a>
                <?php if ($_SESSION['roleUserLoggedIn'] == "Organizer" ) { ?>
                    <a class="actions" href="my_events.php">My Events</a>
                <?php } else if ($_SESSION['roleUserLoggedIn'] == "Staff" ) { ?>
                    <a class="actions" href="manage_event.php">My Event</a>
                <?php } ?>

                <a class="actions" href="create_event.php">Create an Event</a>
                <a class="trailing" id = "nameUser">Welcome back, <b><?=$_SESSION['nameUserLoggedIn']?>!</b></a>
                
                <?php } ?>
                <a class="actions" href="events_now.php?page=1">Events Now</a>
                <a class="actions" href="about.php">About</a> 
            </nav>
        </header>
 