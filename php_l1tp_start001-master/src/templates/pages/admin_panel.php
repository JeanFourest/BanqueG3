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
                        <form method="POST">
                            <select name="Roles">
                                <option value="roles">-- Choisissez un rôle --</option>
                                <option value="Admin">Administrateur</option>
                                <option value="Manager">Manager</option>
                                <option value="Client">Utilisateur vérifié</option>
                            </select>
                            <input type="submit" name="rolesOP" value="Changer">
                            <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                        </form>
                        <?php
                            $userID = $_POST['user_id'];
                            if(isset($_POST["rolesOP"])){
                                $roles = $_POST['Roles'];
                                if($roles == 'Admin'){
                                    $demande = "UPDATE users SET role = 1000 WHERE users.id = '{$userID}'";
                                    $change = $db->prepare($demande);
                                    $change->execute();
                                } elseif($roles == 'Manager'){
                                    $demande = "UPDATE users SET role = 200 WHERE users.id = '{$userID}'";
                                    $change = $db->prepare($demande);
                                    $change->execute();
                                } elseif($roles == 'Client'){
                                    $demande = "UPDATE users SET role = 10 WHERE users.id = '{$userID}'";
                                    $change = $db->prepare($demande);
                                    $change->execute();
                                } else {

                                }
                            }
                        ?>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="submit" name="submit_banOP" value="Bannir">
                            <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                        </form>
                        <?php
                            $userID = $_POST['user_id'];
                            if(isset($_POST["submit_banOP"])){
                                $demande = "UPDATE users SET role = 0 WHERE users.id = '{$userID}'";
                                $change = $db->prepare($demande);
                                $change->execute();
                            }
                        ?>
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
                        <form method="POST">
                            <select name="Roles" id="roles">
                                <option value="roles">-- Choisissez un rôle --</option>
                                <option value="Admin">Administrateur</option>
                                <option value="Manager">Manager</option>
                                <option value="Client">Utilisateur vérifié</option>
                            </select>
                            <input type="submit" name="rolesMid" value="Changer">
                            <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                        </form>
                        <?php
                            $userID = $_POST['user_id'];
                            if(isset($_POST["rolesMid"])){
                                $roles = $_POST['Roles'];
                                if($roles == 'Admin'){
                                    $demande = "UPDATE users SET role = 1000 WHERE users.id = '{$userID}'";
                                    $change = $db->prepare($demande);
                                    $change->execute();
                                } elseif($roles == 'Manager'){
                                    $demande = "UPDATE users SET role = 200 WHERE users.id = '{$userID}'";
                                    $change = $db->prepare($demande);
                                    $change->execute();
                                } elseif($roles == 'Client'){
                                    $demande = "UPDATE users SET role = 10 WHERE users.id = '{$userID}'";
                                    $change = $db->prepare($demande);
                                    $change->execute();
                                } else {

                                }
                            }
                        ?>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="submit" name="submit_ban" value="Bannir">
                            <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                        </form>
                        <?php
                            $userID = $_POST['user_id'];
                            if(isset($_POST["submit_ban"])){
                                $demande = "UPDATE users SET role = 0 WHERE users.id = '{$userID}'";
                                $change = $db->prepare($demande);
                                $change->execute();
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
                        <p>Vérifier</p>
                        <div>
                            <form method="POST">
                                <input type="radio" id="positif" name="choice" value="oui">
                                <label for="positif">Oui</label>
                                <input type="radio" id="négatif" name="choice" value="non">
                                <label for="négatif">Non</label>
                                <br><br>
                                <input type="submit" name="verified" value="Confirmer">
                                <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                            </form>
                            <?php
                                $userID = $_POST['user_id'];
                                if(isset($_POST["verified"])){
                                    $choice = $_POST['choice'];
                                    if($choice == 'oui'){
                                        $demande = "UPDATE users SET role = 10 WHERE users.id = '{$userID}'";
                                        $change = $db->prepare($demande);
                                        $change->execute();
                                    } else {

                                    }
                                }
                            ?>
                        </div>
                    </td>
                    <td>
                        <form method="POST">
                            <input type="submit" name="submit_ban" value="Bannir">
                            <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                        </form>
                        <?php
                            $userID = $_POST['user_id'];
                            if(isset($_POST["submit_ban"])){
                                $demande = "UPDATE users SET role = 0 WHERE users.id = '{$userID}'";
                                $change = $db->prepare($demande);
                                $change->execute();
                            }
                        ?>
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
                        <form method="POST">
                            <input type="submit" name="submit_deban" value="Débannir">
                            <input type="hidden" name="user_id" value="<?=$affichage["2"]?>">
                        </form>
                        <?php
                            $userID = $_POST['user_id'];
                            if(isset($_POST["submit_deban"])){
                                $demande = "UPDATE users SET role = 10 WHERE users.id = '{$userID}'";
                                $change = $db->prepare($demande);
                                $change->execute();
                            }
                        ?>
                    </td>
                </tr>
                <?php
            }
        }
    ?>
</table>

<?php

$page_content = ob_get_clean();
