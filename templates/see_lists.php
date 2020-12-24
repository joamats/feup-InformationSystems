<!DOCTYPE html>
<link href="css/style_see_lists.css" rel="stylesheet">
<link href="css/layout_see_lists.css" rel="stylesheet">

<br><br>
<a href="manage_event.php?eventId=<?=$eventId?>">
    <h1><i class="fas fa-arrow-left"></i> <?=$title?></h1>
</a>
<h2><?=$role?>&#39s Info</h2>
<?php if($role=="Participant"){?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>VAT Number</th>
            <th>Package</th>
            <th>Payment</th>
        </tr>
        <?php foreach($participantsInfo as $participant){?>
            <tr>
                <td><?=$participant['id']?></td>
                <td><?=$participant['name']?></td>
                <td><?=$participant['email']?></td>
                <td><?=$participant['phone_num']?></td>
                <td><?=$participant['address']?></td>
                <td><?=$participant['vat_num']?></td>
                <td><?=$participant['package']?></td>
                <td>
                    <?php if($participant['paymentValidation_status']=="paid"){?>
                        <a class="paid" href = "action_addPaymentStatus.php?role=Participant&personId=<?=$participant['id']?>&paymentValidation=<?=$participant['paymentValidation_status']?>"><?= $participant['paymentValidation_status']?></a>
                    <?php } else{?>
                        <a class="not_paid" href = "action_addPaymentStatus.php?role=Participant&personId=<?=$participant['id']?>&paymentValidation=<?=$participant['paymentValidation_status']?>"><?= $participant['paymentValidation_status']?></a>
                    <?php }?>
                </td>
            </tr>
        <?php }?>
    </table>
    <img class="message-box" src="images/message-box.png" alt="logo">
    <p class="message">Click to change the<br> payment status.</p>
<?php }

else if($role=="Speaker"){?>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Name</th>
            <th>Phone Number</th>            
            <th>Talk Subject</th>
            <th>Talk Abstract</th>
        </tr>
        <?php foreach($speakersInfo as $speaker){?>
            <tr>
                <td><?=$speaker['id']?></td>
                <td><?=$speaker['title']?></td>
                <td><?=$speaker['name']?></td>
                <td><?=$speaker['email']?></td>
                <td><?=$speaker['phone_num']?></td>                
                <td><?=$speaker['talk_subject']?></td>
                <td><?=$speaker['talk_abstract']?></td>
            </tr>
        <?php }?>
    </table>
<?php }

else if($role=="Staff"){?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Department</th>
        </tr>
        <?php foreach($staffInfo as $staff){?>
            <tr>
                <td><?=$staff['id']?></td>
                <td><?=$staff['name']?></td>
                <td><?=$staff['email']?></td>
                <td><?=$staff['phone_num']?></td>                
                <td><?=$staff['department']?></td>
            </tr>
        <?php }?>
    </table>
<?php }

else if($role=="Sponsor"){?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Logotype</th>
            <th>Website Link</th>
            <th>Financial Support Amount</th>
            <th>Package</th>
            <th>Payment</th>
        </tr>
        <?php foreach($sponsorsInfo as $sponsor){?>
            <tr>
                <td><?=$sponsor['id']?></td>
                <td><?=$sponsor['name']?></td>
                <td><?=$sponsor['email']?></td>
                <td><?=$sponsor['logotype']?></td>
                <td><?=$sponsor['website_link']?></td>
                <td><?=$sponsor['financialSupport_amount']?></td>
                <td><?=$sponsor['package']?></td>
                <td>
                    <?php if($sponsor['paymentValidation_status']=="paid"){?>
                        <a class="paid" href = "action_addPaymentStatus.php?role=Sponsor&entityId=<?=$sponsor['id']?>&paymentValidation=<?=$sponsor['paymentValidation_status']?>"><?= $sponsor['paymentValidation_status']?></a>
                    <?php } else{?>
                        <a class="not_paid" href = "action_addPaymentStatus.php?role=Sponsor&entityId=<?=$sponsor['id']?>&paymentValidation=<?=$sponsor['paymentValidation_status']?>"><?= $sponsor['paymentValidation_status']?></a>
                    <?php }?>
                </td>
            </tr>
        <?php }?>
    </table>
    <img class="message-box" src="images/message-box.png" alt="logo">
    <p class="message">Click to change the<br> payment status.</p>
<?php }

else if($role=="Partner"){?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Logotype</th>
            <th>Website Link</th>
            <th>Support Type</th>
            <th>Package</th>
        </tr>
        <?php foreach($partnersInfo as $partner){?>
            <tr>
                <td><?=$partner['id']?></td>
                <td><?=$partner['name']?></td>
                <td><?=$partner['email']?></td>
                <td><?=$partner['logotype']?></td>
                <td><?=$partner['website_link']?></td>
                <td><?=$partner['supportType']?></td>
                <td><?=$partner['package']?></td>
            </tr>
        <?php }?>
    </table>
<?php }?>