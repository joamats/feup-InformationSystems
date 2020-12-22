<!DOCTYPE html>

    </head>
    
    <body>
        <header>
            <nav class="header">
                <a class="trailing" href="index.php"><img src="images/logo.png" alt="logo" width="60"></a>
                <a class="trailing" id = "nameUser">Welcome back, <b><?=$_SESSION['nameUserLoggedIn']?>!</b></a>
                <a class="actions" id = "buttonLogout" href="action_logout.php">Logout</a>
                <?php if ($_SESSION['roleUserLoggedIn'] == "Organizer" ) { ?>
                    <a class="actions"  href="my_events.php">My Events</a>
                <?php } ?>
                <a class="actions" href="create_event.php">Create an Event</a>
            </nav>
        </header>
