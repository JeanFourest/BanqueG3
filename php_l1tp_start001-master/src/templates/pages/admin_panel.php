<?php

$page_title = "Admin panel - MonSite.com";

$infos = $userPeople->modifyRole();

ob_start();
?>

<h1>Edit roles</h1>

<table>
    <tr>
        <th>Email</th>
        <th>Rôle</th>
        <th>Rôles</th>
        <th>Bannissement</th>
    </tr>
    <?php
        foreach($infos as $affichage){
            if($affichage["1"] == 1000){
                ?>
                <tr>
                    <td>
                        <?= $affichage["0"] ?>
                    </td>
                    <td>
                        <p>Admin</p>
                    </td>
                </tr>
                <?php
            } elseif($affichage["1"] == 200){
                ?>
                <tr>
                    <td>
                        <?= $affichage["0"] ?>
                    </td>
                    <td>
                        <p>Manager</p>
                    </td>
                    <td>
                        <label for="roles"></label>
                        <select name="Roles" id="roles">
                            <option value="roles">-- Choisissez un rôle --</option>
                            <option value="Admin">Administrateur</option>
                            <option value="Manager">Manager</option>
                            <option value="Client">Utilisateur vérifié</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit"><p>Bannir</p></button>
                    </td>
                </tr>
                <?php
            } elseif($affichage["1"] == 10){
                ?>
                <tr>
                    <td>
                        <?= $affichage["0"] ?>
                    </td>
                    <td>
                        <p>Utilisateur vérifié</p>
                    </td>
                    <td>
                        <label for="roles"></label>
                        <select name="Roles" id="roles">
                            <option value="roles">-- Choisissez un rôle --</option>
                            <option value="Admin">Administrateur</option>
                            <option value="Manager">Manager</option>
                            <option value="Client">Utilisateur vérifié</option>
                        </select>
                    </td>
                    <td>
                        <form method="POST">
                            <button type="submit"><p>Bannir</p></button>
                        </form>
                        <?php
                            if(isset($_POST["submit"])){
                                $demande = $this->db->prepare("SELECT users.id FROM ");
                            }
                        ?>
                    </td>
                </tr>
                <?php
            } elseif($affichage["1"] == 1){
                ?>
                <tr>
                    <td>
                        <?= $affichage["0"] ?>
                    </td>
                    <td>
                        <p>Utilisateur non-vérifié</p>
                    </td>
                    <td>
                        <form>
                            <p>Vérifier</p>
                            <div>
                                <input type="radio" id="positif" name="choice" value="oui">
                                <label for="positif">Oui</label>
                                <input type="radio" id="négatif" name="choice" value="non">
                                <label for="négatif">Non</label>
                            </div>
                        </form>
                    </td>
                    <td>
                        <button type="submit"><p>Bannir</p></button>
                    </td>
                </tr>
                <?php
            } else{
                ?>
                <tr>
                    <td>
                        <?= $affichage["0"] ?>
                    </td>
                    <td>
                        <p>Utilisateur banni</p>
                    </td>
                    <td>

                    </td>
                    <td>
                        <button type="submit"><p>Débannir</p></button>
                    </td>
                </tr>
                <?php
            }
        }
    ?>
</table>

<?php

$page_content = ob_get_clean();
