<?php

$page_title = "Bank Account";

ob_start();

#$soldeEuro = 1500;

$depos = $depoWith-> depo();
$withs = $depoWith-> with();
$trans = $depoWith->tran();
$balance = $depoWith -> balances();

$money = 0;

foreach($depos as $depo) {
    $money = $money + $depo["2"];
}

foreach($withs as $with) {
    $money = $money - $with["2"];
}


?>

<h1>My Bank Account</h1>


<h2>solde : <?= $money
?> €</h2>

<p>voici votre historique des depositions :</p>
<table>
    <tr>
        <th>AJOUTER</th>
        <th>MESSAGE</th>
        <th>ADMIN</th>
        <th>TIME</th>
    </tr>
    <?php

    foreach ($depos as $depo) {
        ?>
        <tr>
            <td align="center">+ <?=$depo["2"] ?> €</td>
            <td align="center"><?=$depo["3"] ?></td>
            <td align="center"><?=$depo["4"] ?></td>
            <td align="center"><?=$depo["6"] ?></td>
        </tr>

        <?php
    }
    ?>
</table><br><br>


<p>voici votre historique des retraites :</p>
<table>
    <tr>
        <th>RETIRER</th>
        <th>ADMIN</th>
        <th>TIME</th>
    </tr>
    <?php

    foreach ($withs as $with) {
        ?>
        <tr>
            <td align="center">- <?=$with["2"] ?> €</td>
            <td align="center"><?=$with["3"] ?></td>
            <td align="center"><?=$with["5"] ?></td>
        </tr>

        <?php
    }
    ?>
</table><br><br>

<p>voici votre historique des transactions :</p>
<table>
    <tr>
        <th>SENDER</th>
        <th>RECEIVER</th>
        <th>CURRENCIE</th>
        <th>TIME</th>
    </tr>
    <?php

    foreach ($trans as $tran) {
        ?>
        <tr>
            <td align="center"><?=$with["1"] ?></td>
            <td align="center"><?=$with["2"] ?></td>
            <td align="center"><?=$with["4"] ?></td>
            <td align="center"><?=$with["5"] ?></td>
        </tr>

        <?php
    }
    ?>
</table>
<br><br>
<?php show_error(); ?>
<?php include_once __DIR__ . '/../partials/alert_success.php'; ?>

<form action="/actions/bank_account.php" method="post">
    <label for="price">combien voulez vous deposer :</label>
    <input type="text" name="price" id="price"><br>

    <label for="message">mettez un message :</label>
    <input type="text" name="message" id="message"><br>

    <button type="submit">ENVOYER</button>
</form>
<br>
<br>
<form action="/actions/bank_accountWith.php" method="post">
    <label for="priceWith">combien voulez vous retirer :</label>
    <input type="text" name="priceWith" id="priceWith"><br>

    <button type="submit">ENVOYER</button>
</form>

<?php
$page_content = ob_get_clean();