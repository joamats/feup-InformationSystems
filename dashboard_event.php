<?php 
require_once('config/init.php');
if( $_SESSION['roleUserLoggedIn'] === false || $_SESSION['roleUserLoggedIn'] === null) {
    $_SESSION['message'] = "Please Login First!";
    die(header('Location: login.php'));
}
else {
    include('templates/head.php'); 
    include('templates/header_private.html');

?>
<!DOCTYPE html>

<h1>Web Summit 2020</h1>
<h2>Participants</h2>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Adress</td>
        <td>VAT Number</td>
        <td>Payment</td>
    </tr>
    <tr>
        <td>10234</td>
        <td>João Carlos Matos</td>
        <td>joaocarlos@gmail.com</td>
        <td>+351934567899</td>
        <td>Rua Lorem Ipsum, 1234</td>
        <td>432 354 345</td>
        <td>Not paid</td>
    </tr>
</table>

<h2>Speakers</h2>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Adress</td>
        <td>VAT Number</td>
        <td>Payment</td>
    </tr>
    <tr>
        <td>10234</td>
        <td>João Carlos Matos</td>
        <td>joaocarlos@gmail.com</td>
        <td>+351934567899</td>
        <td>Rua Lorem Ipsum, 1234</td>
        <td>432 354 345</td>
        <td>Not paid</td>
    </tr>
</table>
<h2>Staff</h2>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Adress</td>
        <td>VAT Number</td>
        <td>Payment</td>
    </tr>
    <tr>
        <td>10234</td>
        <td>João Carlos Matos</td>
        <td>joaocarlos@gmail.com</td>
        <td>+351934567899</td>
        <td>Rua Lorem Ipsum, 1234</td>
        <td>432 354 345</td>
        <td>Not paid</td>
    </tr>
</table>
<h2>Sponsors</h2>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Adress</td>
        <td>VAT Number</td>
        <td>Payment</td>
    </tr>
    <tr>
        <td>10234</td>
        <td>João Carlos Matos</td>
        <td>joaocarlos@gmail.com</td>
        <td>+351934567899</td>
        <td>Rua Lorem Ipsum, 1234</td>
        <td>432 354 345</td>
        <td>Not paid</td>
    </tr>
</table>
<h2>Partners</h2>
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>Adress</td>
        <td>VAT Number</td>
        <td>Payment</td>
    </tr>
    <tr>
        <td>10234</td>
        <td>João Carlos Matos</td>
        <td>joaocarlos@gmail.com</td>
        <td>+351934567899</td>
        <td>Rua Lorem Ipsum, 1234</td>
        <td>432 354 345</td>
        <td>Not paid</td>
    </tr>
</table>


<h2>Edit this Event</h2>
<form action="save.php" method="get">
    <fieldset>
        <legend>
            Event's Codes
        </legend>

        <label>Code for Speakers:
            <br>
            <input type="text" name="name" value="SpeakerWEBSUMMIT2020">
        </label>
        <br>
        <label>Code for Staff:
            <br>
            <input type="text" name="name" value="StaffWEBSUMMIT2020">
        </label>
        <br>

        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>

<form action="save.php" method="get">
    <fieldset>
        <legend>
            New Package
        </legend>

        <label>Package Target:
            <br>
            <select name="target">
                <option value="Participant">Participant</option>
                <option value="Sponsor">Sponsor</option>
                <option value="Partner">Partner</option>
            </select>
        </label>
        <br>
        <label>Package's name:
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <label>Features:
            <br>
            <input type="text" name="features">
        </label>
        <br>
        <label>Maximum number of Part:
            <br>
            <input type="text" name="features">
        </label>

        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php }
    include('templates/footer.html');
?>