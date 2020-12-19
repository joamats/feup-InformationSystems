<!DOCTYPE html>
<link href="css/style_header.css" rel="stylesheet">
    </head>
    
    <body>
        <header>
            <nav class="header">
                <a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
                <?php if (!isset($_SESSION['roleUserLoggedIn'])) { ?>
                <a class="actions" id = "buttonLogin" href="login.php">Login</a>
                
                <?php } else { ?>
                <a class="actions" id = "buttonLogout" href="action_logout.php">Logout</a>
                <a class="actions" href="dashboard_event.php">Dashboard</a>
                <?php } ?>
                <a class="actions" href="registration.php?role=Organizer">Become an Organizer</a>
                <a class="actions" href="events_now.php">Events</a>
                <a class="actions" href="about.php">About</a> 
            </nav>
        </header>
 
