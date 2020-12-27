<!DOCTYPE html>
<link href="css/style_selection_role.css" rel="stylesheet">


<h2>Create packages for <?=$eventName?></h2>
<h3>Target of Package:</h3>
<ul>
    <?php foreach($roles as $role) { ?>
        <li>
            <a href="create_package.php?eventId=<?=$eventId?>&role=<?=$role?>"><?=$role?></a>
        </li>
    <?php } ?>
</ul>
</body>
</html>