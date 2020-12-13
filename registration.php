<!DOCTYPE html>
<?php include('templates/head.html'); ?>
<link href="css/layout_registration.css" rel="stylesheet">
<link href="css/style_registration.css" rel="stylesheet">


<?php
    require_once('database/events.php'); 
    $role = $_GET['role']; 
    if($role != 'Organizer'){
        $eventId = $_GET['id'];
        $title = getEventNameById($eventId);
    } else {
        $title = 'So, you want to become an Organizer?';
    }
    include('templates/header_public.php');
?>

<br>
<h1><?=$title?></h1>

<form action="save_registration.php?role=<?=$role?>&id=<?=$eventId?>" method="post">
    <fieldset>
        <legend>
            Register as <?=$role?>
        </legend>

        <label>Name:
            <br>
            <input type="text" name="name">
        </label>

        <?php if($role == "Organizer" || $role == "Participant" || $role == "Speaker" || $role == "Staff") {
            
            if($role == 'Speaker') {?>
                <br>
                <label>Title:
                    <br>
                    <input type="text" name="title">
                </label>
            <?php } ?>
            
            <br>
            <label>Email:
                <br>
                <input type="email" name="email">
            </label>

            <?php if($role == "Organizer" || $role == "Staff") {?>
                <br>
                <label>Password:
                    <br>
                    <input type="password" name="password">
                </label>
            <?php } ?>

            <br>
            <label>Phone Number:
                <br>
                <input type="text" name="phone_num">
            </label>

            <?php if($role == "Participant" || $role == "Organizer" ) {?>
                <br>
                <label>Adress:
                    <br>
                <input type="text" name="adress">
                </label>

                <br>
                <label>VAT Number:
                    <br>
                    <input type="number" name="VAT_num">
                </label>
            <br><br>

            <?php } elseif($role == "Speaker") { ?>
                <br>
                <label>Talk's Subject:
                    <br>
                    <input type="text" name="subject_talk">
                </label>

                <br>
                <label>Talk's Abstract:
                    <br>
                    <textarea name="talk_abstract" rows="6" cols="50"></textarea>
                </label>

            <?php } elseif($role == "Staff") { ?>
                <br>
                <label>Department:
                    <br>
                <input type="text" name="department">
                </label>

            <?php } if($role == "Organizer") { ?>
                <br>
                <label>Logotype:
                    <br>
                    <input type="file" name="logotype">
                </label>
            <?php } elseif($role == 'Speaker' || $role == 'Staff') { ?>

                <br>
                <label>Upload Profile Picture:
                    <br>
                    <input type="file" name="profile_picture" accept="image/*">
                </label>
            <?php }
        } ?>

        <?php if($role == "Sponsor" || $role == "Partner") {?>
            
            <br>
            <label>Website link:
                <br>
                <input type="URL" name="website_link">
            </label>

            <?php if($role == "Sponsor") { ?>
                <br>
                <label>Financial Support Amount:
                    <br>
                    <input type="number" name="financialSupport_amount">
                </label>
                
            <?php } elseif($role == "Partner") { ?>

                <br>
                <label>Support Type:
                    <br>
                    <input type="text" name="supportType">
                </label>
            <?php } ?>

            <br>
            <label>Logotype:
                <br>
                <input type="file" name="logotype" accept="image/*">
            </label>

        <?php } ?>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
    include('templates/footer.html');
?>