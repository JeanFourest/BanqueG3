<?php

$page_title = "Bank Account";

ob_start();

#$soldeEuro = 1500;

$depos = $depoWith-> depo();
$withs = $depoWith-> with();
$trans = $depoWith->tran();
$balance = $depoWith -> balances();
?>

<h1>My Bank Account</h1>


<h2>solde : <?= $balance["0"] ?> €</h2>

<p>voici votre historique des déposites :</p>
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
            <td><?=$depo["2"] ?></td>
            <td><?=$depo["3"] ?></td>
            <td><?=$depo["4"] ?></td>
            <td><?=$depo["6"] ?></td>
        </tr>

        <?php
    }
    ?>
</table><br><br>


<p>voici votre historique des withdraws :</p>
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
            <td><?=$with["2"] ?></td>
            <td><?=$with["3"] ?></td>
            <td><?=$with["5"] ?></td>
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
            <td><?=$with["1"] ?></td>
            <td><?=$with["2"] ?></td>
            <td><?=$with["4"] ?></td>
            <td><?=$with["5"] ?></td>
        </tr>

        <?php
    }
    ?>
</table>

<form action="">
    <label for=""></label>
</form>


déposer
retirer

<?php
$page_content = ob_get_clean();