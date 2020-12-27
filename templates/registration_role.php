<!DOCTYPE html>
<link href="css/style_selection_role.css" rel="stylesheet">

<h2>Registration for <?=$eventName?></h2>
<h3>What's your Role?</h3>
<ul>
    <?php foreach($roles as $role) { 
        if($role == "Participant" || $role == "Sponsor") {?>
        <li>
            <a href="registration.php?role=<?=$role?>&id=<?=$eventId?>"><?=$role?></a>
        </li>
        <?php } else { ?>
        <li>
            <a href="insert_code.php?role=<?=$role?>&id=<?=$eventId?>"><?=$role?></a>
        </li>
    <?php }
    } ?>
</ul>
</body>
</html>