<?php
if(isset($_GET['userModif'])) {
    $user = new UserController();
    $user = $user->logUser(strip_tags(trim($_GET['userModif'])));
?>

<div id="modaleUser">
    <form action="../update.php?error=0&id=<?=$user->getId()?>" method="POST">
        <div>
            <label for="firstname">Prénom: </label>
            <input type="text" name="firstname" id="firstname" placeholder="<?=$user->getFirstname()?>">
        </div>
        <div>
            <label for="lastname">Nom: </label>
            <input type="text" name="lastname" id="lastname" placeholder="<?=$user->getLastname()?>">
        </div>
        <div>
            <label for="password">Mot de passe: </label>
            <input type="text" name="password" id="password">
        </div>
        <div>
            <label for="mail">Adresse email: </label>
            <input type="email" name="mail" id="mail" placeholder="<?=$user->getMail()?>">
        </div>
        <div>
            <label for="role">Role: </label>
            <select name="role_fk" id="role">
                <?php
                $role = new RoleController();
                $roles = $role->getRole();
                foreach ($roles as $item) {
                    /* @var Role $item */
                    $selected = $item->getName() === $user->getRole() ? 'selected' : '';
                    echo "<option value='" . $item->getId() . "' ".$selected.">" . $item->getName() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="account_options">
            <div>
                <button type="submit">Confirmer</button>
                <a href='administration.php'><button type="button" class="button_delete">Annuler</button></a>
            </div>
        </div>
    </form>
</div>
<?php
}