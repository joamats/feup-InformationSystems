<!DOCTYPE html>
<?php
    include('templates/header_public.html');
?>

<br>
<h1>Web Summit</h1>
<form action="action_registration.php" method="get">
    <fieldset>
        <legend>
            Your Details as a Staff Member
        </legend>

        <label>Name:
            <br>
            <input type="text" name="name">
        </label>

        <br>
        <label>Email:
            <br>
            <input type="text" name="email">
        </label>

        <br>
        <label>Password:
            <br>
            <input type="password" name="password">
        </label>

        <br>
        <label>Phone Number:
            <br>
            <input type="text" name="phone_num">
        </label>
        
        <br>
        <label>Department:
            <br>
            <select name="department">
                <option value="photography"> Photography</option>
                <option value="logistics"> Logistics</option>
                <option value="financial"> Financial</option>
            </select>
        </label>
        

        
        <br>
        <label>Upload a Profile Picture:
            <br>
            <input type="file" name="staff_img" accept="image/*">
        </label>
        <br><br>

        <input type="submit" value="Submit">
    </fieldset>
</form>


<?php
    include('templates/footer.html');
?>