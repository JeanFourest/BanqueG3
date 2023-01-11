<?php

$page_title = "Accueil - MonSite.com";

// $niceData = htmlspecialchars("Bonjour je tente une piraterie <script>alert('hacked')</script>");
// $badData = "FAILLE XSS <script>alert('hacked')</script>";

// ob_start, c'est comme si tu ouvrais les "" pour enregistrer une grosse chaine de caracteres.
ob_start();
?>
<h1>Titre de la page d'accueil</h1>

<?php
// ob_get_clean c'est la fermeture des "" pour finir la chaine de caracteres et l'enregistrer dans la variable
$page_content = ob_get_clean();

// Script de la page home
ob_start();
?>
<script>
</script>
<?php
$page_scripts = ob_get_clean();
