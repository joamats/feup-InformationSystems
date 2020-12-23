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
        <?php foreach($participantInfo as $participant){?>
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

else if($role==Speaker){?>
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
<?php }

else if($role==Staff){?>
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
<?php }

else if($role==Sponsor){?>
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
<?php }

else if($role==Partner){?>
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
<?php }?>