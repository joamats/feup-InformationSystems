<!DOCTYPE html>
<link href="css/layout_registration.css" rel="stylesheet">
<link href="css/style_registration.css" rel="stylesheet">

<br>
<h1><?=$title?></h1>

<form action="action_saveRegistration.php?role=<?=$role?>&id=<?=$eventId?>" method="post">
    <fieldset>
        <legend>
            Register as <span class="role"><?=$role?></span>
        </legend>

        <?php if (isset($_MESSAGE)) { ?>
            <div class="errorMessage">
            <?=$_MESSAGE?>
            </div>
        <?php } ?>

        <br>

        <label>Email *
            <br>
            <input class="write_input" type="email" name="email" required>
        </label>

        <?php if($role == "Organizer" || $role == "Staff") {?>
            <br>
            <label>Password *
                <br>
                <input class="write_input" type="password" name="password" required>
            </label>
        <?php } ?>

        <label>Name *
            <br>
            <input class="write_input" type="text" name="name" required>
        </label>

        <?php if($role == "Organizer" || $role == "Participant" || $role == "Speaker" || $role == "Staff") {
            
            if($role == 'Speaker') {?>
                <br>
                <label>Title
                    <br>
                    <input class="write_input" type="text" name="title">
                </label>
            <?php } ?>
            
            <br>
            <label>Phone Number *
                <br>
                <input class="write_input" type="tel" id="phone" name="phone_num" pattern="[0-9]{9}" required>
            </label>

            <?php if($role == "Participant" || $role == "Organizer" ) {?>
                <br>
                <label>Address *
                    <br>
                <input class="write_input" type="text" name="address" required>
                </label>

                <br>
                <label>VAT Number *
                    <br>
                    <input class="write_input" type="number" name="vat_num" required>
                </label>
            <br><br>

            <?php } elseif($role == "Speaker") { ?>
                <br>
                <label>Talk's Subject *
                    <br>
                    <input class="write_input" type="text" name="talk_subject" required>
                </label>

                <br>
                <label>Talk's Abstract
                    <br>
                    <textarea id="talk_abstract" name="talk_abstract" rows="6" cols="50"></textarea>
                </label>

            <?php } elseif($role == "Staff") { ?>
                <br>
                <label>Department *
                    <br>
                    <input class="write_input" type="text" name="department" required></input>
                </label>

            <?php } 
        } ?>

        <?php if($role == "Sponsor" || $role == "Partner") {?>
            
            <br>
            <label>Website link *
                <br>
                <input class="write_input" type="URL" name="website_link" required>
            </label>

            <?php if($role == "Sponsor") { ?>
                <br>
                <label>Financial Support Amount *
                    <br>
                    <input class="write_input" type="number" name="financialSupport_amount" required>
                </label>
                
            <?php } elseif($role == "Partner") { ?>

                <br>
                <label>Support Type *
                    <br>
                    <input class="write_input" type="text" name="supportType" required>
                </label>
            <?php } ?>

            <br>

        <?php } ?>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>