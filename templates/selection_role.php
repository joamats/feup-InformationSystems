<!DOCTYPE html>
<link href="css/style_selection_role.css" rel="stylesheet">

<h2>Registration for Event:</h2>
<h3>What's your Role?</h3>
<ul>
    <?php foreach($roles as $role) { ?>
        <li>
            <a href="registration.php?role=<?=$role?>&id=<?=$eventId?>"><?=$role?></a>
        </li>
    <?php } ?>
</ul>