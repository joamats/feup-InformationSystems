<!DOCTYPE html>
<link href="css/style_see_lists.css" rel="stylesheet">
<link href="css/layout_see_lists.css" rel="stylesheet">

<br><br>
<h1><?=$title?></h1>
<h2><?=$role?>&#39s Info</h2>
<?php if($role=="Participant"){?>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>Address</td>
            <td>VAT Number</td>
            <td>Package</td>
            <td>Payment</td>
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
                    <select name="paymentValidation">
                        <?php if($paymentValidation == "paid") {?>
                            <option value="paid"> Paid</option>
                            <option value="not_paid"> Not Paid</option>
                        <?php } else { ?>
                            <option value="not_paid"> Not Paid</option>
                            <option value="paid"> Paid</option>
                        <?php } ?>
                    </select>
                </td>
                <td><a href = "action_addPaymentStatus.php?role=Participant&paymentValidation=<?=$changedPaymentValidation?>">Submit Payment</a></td>
            </tr>
        <?php }?>
    </table>
<?php }

else if($role=="Speaker"){?>
    <table>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone Number</td>            
            <td>Talk Subject</td>
            <td>Talk Abstract</td>
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
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>Department</td>
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
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Logotype</td>
            <td>Website Link</td>
            <td>Financial Support Amount</td>
            <td>Package</td>
            <td>Payment</td>
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
                    <select name="paymentValidation">
                        <?php if($paymentValidation == "paid") {?>
                            <option value="paid"> Paid</option>
                            <option value="not_paid"> Not Paid</option>
                        <?php } else { ?>
                            <option value="not_paid"> Not Paid</option>
                            <option value="paid"> Paid</option>
                        <?php } ?>
                    </select>
                </td>
                <td><a href = "action_addPaymentStatus.php?role=Sponsor&paymentValidation=<?=$package['name']?>">Submit Payment</a></td>
            </tr>
        <?php }?>
    </table>
<?php }

else if($role=="Partner"){?>
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Logotype</td>
            <td>Website Link</td>
            <td>Support Type</td>
            <td>Package</td>
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