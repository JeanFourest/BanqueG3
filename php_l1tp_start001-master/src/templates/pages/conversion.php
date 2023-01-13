<?php

$page_title = "Conversion - MonSite.com";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>
<h1>Conversion de votre argent</h1>

<?php 
    $demande_balance = $db->prepare('SELECT balance FROM bankaccounts WHERE id_users = ?');
    $demande_balance -> bindParam(1, $user->id);
    $demande_balance -> execute();
    $resultat_balance = $demande_balance->fetch();

    $dollar_price = $currencies -> getPrice('Dollar');
    $sterling_price = $currencies -> getPrice('Livre%');
    $yen_price = $currencies -> getPrice('Yen');
    $bitcoin_price = $currencies -> getPrice('Bitcoin');
?>

<p>Vous avez <?= $resultat_balance['balance'];?> euros sur votre compte.</p>

<p>Ce qui équivaut à :</p>
<nav>
    <ul>
        <li><?= $dollar_price["1"] * $resultat_balance['balance']; ?> USD</li>
        <li><?= $sterling_price["0"] * $resultat_balance['balance']; ?> GBP</li>
        <li><?= $yen_price["2"] * $resultat_balance['balance']; ?> JPY</li>
        <li><?= $bitcoin_price["3"] * $resultat_balance['balance']; ?> BTC</li>
    </ul>
</nav>

<p>Combien d'argent voulez-vous convertir et en quelle monnaie ?</p>

<form action='/actions/conversion.php' method='POST'>
    <div>
        <input type="number" id="money_conversion" name="money_conversion">
        <select name="money" id="money">
            <option value="">Choisir une monnaie</option>
            <option value="dollar">USD</option>
            <option value="sterling">GBP</option>
            <option value="yen">JPY</option>
            <option value="bitcoin">BTC</option>
        </select>
	</div>
    <button type="submit">Valider</button>
</form>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();

// Script de la page home
ob_start();
?>
<?php
$page_scripts = ob_get_clean();