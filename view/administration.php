<?php
include './elements/header.php';
?>
    <link href="./styles/admin_page.css" rel="stylesheet">
<?php
    if (isset($_GET['error'])){
        if ($_GET['error'] === '0'){
            echo '<div id="error_no_problem">La base de données a été mise à jour!</div>';
        }
        else if ($_GET['error'] === '1'){
            echo '<div id="error_problem">Un problème est survenu!</div>';
        }
        else if ($_GET['error'] === '2'){
            echo '<div id="error_problem_mail">Adresse mail déjà utilisée!</div>';
        }
        else if ($_GET['error'] === '3'){
            echo '<div id="error_problem">Cette catégorie est liée à des documents!</div>';
        }
    }
?>

    <div id="admin_day_message">
        <h2>Message d'accueil:</h2>
        <form>
            <div>
                <input type="text">
            </div>
            <div>
                <button type="button" id="buttonDelCat" class="delete_button">Valider</button>
            </div>
        </form>
    </div>

    <div id="admin_section">
        <div>
            <h2>Ajouter une catégorie:</h2>
            <form method="POST" action="../create.php?error=0&table=Category">
                <div>
                    <label for="categoryAdd">Nom: </label>
                    <input type="text" id="categoryAdd" name="name" required>
                </div>
                <div>
                    <select name="section_fk">
                        <?php
                        $section = new SectionController();
                        $sections = $section->getSection();
                        foreach ($sections as $item) {
                            $selected = $item->getName();
                            echo "<option value='" . $item->getId() . "' ".$selected.">" . $item->getName() . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button value="Envoyer">Ajouter</button>
                </div>
            </form>
        </div>
        <div>
            <h2>Supprimer une catégorie:</h2>
            <form>
                <div>
                    <label for="categoryDel">Catégorie: </label>
                    <select name="name" id="categoryDel">
                        <?php
                        $category = new CategoryController();
                        $categories = $category->getCategory();
                        foreach ($categories as $item) {
                            $selected = $item->getName();
                            echo "<option value='" . $item->getId() . "' ".$selected.">"  .$item->getName() . " (" .$item->getSection() . ")" ."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="button" id="buttonDelCat" class="delete_button">Supprimer</button>
                </div>
            </form>
        </div>
    </div>

    <div id="admin_add_account">
        <h2>Ajouter un nouveau compte:</h2>
        <form action="../create.php?table=User&error=0" method="POST" id="admin_create_user">
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
                <select id="choiceCat">
                    <option value="tous">tous</option>
                    <?php
                    foreach ($roles as $item) {
                    echo "<option value='" . $item->getName() . "'>" . $item->getName() . "</option>";
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
                    <div class="accounts_results" data-role="<?= $user->getRole()?>">
                        <div><?= $user->getLastname() . " " . $user->getFirstname()?></div>
                        <div id="roleUser"><?= $user->getRole()?></div>
                        <div class="account_options">
                            <a href="administration.php?userModif=<?= $user->getMail()?>"><button class="accounts_modif">Modifier</button></a>
                            <button class="account_delete" value="<?= $user->getId()?>">X</button>
                        </div>
                    </div>
            <?php } ?>

        </div>

    </div>


<?php
include "./elements/footer.php";
?>
