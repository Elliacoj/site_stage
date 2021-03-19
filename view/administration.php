<?php
include './elements/header.php';
?>
    <link href="./styles/admin_page.css" rel="stylesheet">
<?php
    if (isset($_GET['error'])){
        if ($_GET['error'] === '0'){
            echo '<div id="error_no_problem">La base de donnée à étais mise à jour!</div>';
        }
        else if ($_GET['error'] === '1'){
            echo '<div id="error_problem">Un problème est survenus!</div>';
        }
        else if ($_GET['error'] === '2'){
            echo '<div id="error_problem_mail">Adresse mail déjà utilisée!</div>';
        }
    }
?>

    <div id="admin_add_account">
        <h2>Ajouter un nouveau compte:</h2>
        <form action="../create.php?table=user&error=0" method="POST" id="admin_create_user">
            <div>
                <label for="firstname">Prénom: </label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div>
                <label for="lastname">Nom: </label>
                <input type="text" name="lastname" id="lastname" required>
            </div>
            <div>
                <label for="password">Mot de passe: </label>
                <input type="text" name="password" id="password" required>
            </div>
            <div>
                <label for="mail">Adresse email: </label>
                <input type="email" name="mail" id="mail" required>
            </div>
            <div>
                <label for="role">Role: </label>
                <select name="role" id="role" required>
                    <?php
                    $role = new RoleController();
                    $roles = $role->getRole();
                    foreach ($roles as $item) {
                        echo "<option value='" . $item->getId() . "'>" . $item->getName() . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="account_options">
                <button type="submit" value="Envoyer">Ajouter</button>
            </div>
        </form>
    </div>

    <div id="admin_accounts_list">
        <h2>Liste des comptes:</h2>
        <div id="accounts_list_search">
            <div>Recherche:</div>
            <div>par rôle:
                <select>
                    <?php
                    foreach ($roles as $item) {
                    echo "<option value='" . $item->getId() . "'>" . $item->getName() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <!-- Example de résultat -->
        <div id="accounts_results_screen">
            <!-- results exemple -->

            <!-- --- --->
            <?php
                $users = new UserController();
                $users = $users->getUser();
                foreach ($users as $user) {
            ?>
                    <div class="accounts_results">
                        <div><?= $user->getLastname() . " " . $user->getFirstname()?></div>
                        <div><?= $user->getRole()?></div>
                        <div class="account_options">
                            <button class="accounts_modif">Modifier</button>
                            <button class="account_delete" value="<?= $user->getId()?>">X</button>
                        </div>
                    </div>
            <?php } ?>

        </div>

    </div>


<?php
include "./elements/footer.php";
?>
