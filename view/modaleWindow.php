<?php
if(isset($_GET['userModif'])) {
    $user = new UserController();
    $user = $user->logUser(strip_tags(trim($_GET['userModif'])));
?>

<div id="modaleUser" class="modale">
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

if(isset($_GET['docModif'])) {
    $document = new DocumentController();
    $document = $document->searchDocument(strip_tags(trim($_GET['docModif'])));
    ?>
<div id="modaleUser" class="modale">
    <form action="../update.php?error=0&id=<?=$document->getId()?>" method="POST" enctype="multipart/form-data">
        <div>
            <label for="title">Titre: </label>
            <input type="text" name="title" id="title" placeholder="<?=$document->getTitle()?>">
        </div>
        <div>
            <label for="link">lien: </label>
            <input type="text" name="link" id="link" placeholder="<?=$document->getLink()?>">
        </div>
        <div>
            <label for="file"></label>
            <input type="file" id="file" name="file">
        </div>
        <div>
            <label for="category">Catégorie: </label>
            <select name="category_fk" id="category">
                <?php
                $category = new CategoryController();
                $categories = $category->getCategory();
                foreach ($categories as $item) {
                    /* @var Category $item */
                    $selected = $item->getName() === $document->getCategory() ? 'selected' : '';
                    echo "<option value='" . $item->getId() . "' ".$selected.">" . $item->getName() . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="item">Type de document: </label>
            <select name="item_fk" id="item">
                <?php
                $item = new ItemController();
                $items = $item->getItem();
                foreach ($items as $value) {
                    /* @var Item $value */
                    $selected = $value->getName() === $document->getItem() ? 'selected' : '';
                    echo "<option value='" . $value->getId() . "' ".$selected.">" . $value->getName() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="account_options">
            <div>
                <button type="submit">Confirmer</button>
                <a href='course.php'><button type="button" class="delete_button">Annuler</button></a>
            </div>
        </div>
    </form>
</div>
<?php
}
