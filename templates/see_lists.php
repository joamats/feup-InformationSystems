<!DOCTYPE html>
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
            <td>Payment</td>
            <td>Package</td>
        </tr>
        <?php foreach($participantsInfo as $participant){?>
            <tr>
                <td><?=$participant['id']?></td>
                <td><?=$participant['name']?></td>
                <td><?=$participant['email']?></td>
                <td><?=$participant['phone_num']?></td>
                <td><?=$participant['address']?></td>
                <td><?=$participant['vat_num']?></td>
                <td><?=$participant['paymentValidation_status']?></td>
                <td><?=$participant['package']?></td>
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
            <td>Payment Validation Status</td>
            <td>Package</td>
        </tr>
        <?php foreach($sponsorsInfo as $sponsor){?>
            <tr>
                <td><?=$sponsor['id']?></td>
                <td><?=$sponsor['name']?></td>
                <td><?=$sponsor['email']?></td>
                <td><?=$sponsor['logotype']?></td>
                <td><?=$sponsor['website_link']?></td>
                <td><?=$sponsor['financialSupport_amount']?></td>
                <td><?=$sponsor['paymentValidation_status']?></td>
                <td><?=$sponsor['package']?></td>
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
                <td><?=$partner['financialSupport_amount']?></td>
                <td><?=$partner['paymentValidation_status']?></td>
                <td><?=$partner['package']?></td>
            </tr>
        <?php }?>
    </table>
<?php }?>