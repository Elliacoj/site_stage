<?php
// Modal for modif a User
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
                <a href='administration.php'><button type="button" class="delete_button">Annuler</button></a>
            </div>
        </div>
    </form>
</div>
<?php
}

// Modal for modif a Document
if(isset($_GET['docModif'])) {
    $document = new DocumentController();
    $document = $document->searchDocument(strip_tags(trim($_GET['docModif'])));
    ?>
<div id="modaleUser" class="modale">
    <form action="../update.php?error=0&id=<?=$document->getId()?>&doc=<?=$_GET['doc']?>" method="POST" enctype="multipart/form-data">
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
                <a href='<?=$_GET['doc']?>'><button type="button" class="delete_button">Annuler</button></a>
            </div>
        </div>
    </form>
</div>
<?php
}

// Modal for create a Document
if(isset($_GET['docCreate'])) {
    ?>
    <div id="modaleUser" class="modale">
        <form action="../create.php?error=0&table=Document&doc=<?=$_GET['doc']?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="title">Titre: </label>
                <input type="text" name="title" id="title" required">
            </div>
            <div>
                <label for="link">lien: </label>
                <input type="text" name="link" id="link" required">
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
                        $selected = $item->getName() === $_GET['category'] ? 'selected' : '';
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
                        $selected = $value->getName() === $_GET['item'] ? 'selected' : '';
                        echo "<option value='" . $value->getId() . "' ".$selected.">" . $value->getName() . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="account_options">
                <div>
                    <button type="submit">Confirmer</button>
                    <a href='<?=$_GET['doc']?>'><button type="button" class="delete_button">Annuler</button></a>
                </div>
            </div>
        </form>
    </div>
    <?php
}

// Modal for create a commentary
if(isset($_GET['docComment'])) {
    $doc = new DocumentController();
    $doc = $doc->searchDocument($_GET['docComment']);
    ?>
    <div id="modaleUser" class="modale">
        <h2><?=$doc->getTitle()?></h2>
        <a href='<?=$_GET['doc']?>'><i class="fas fa-window-close modale_close"></i></a>
        <?php
        $comments = new CommentaryController();
        $comments = $comments->getCommentary();

        echo '<div class="commentaire_list">';
        foreach($comments as $comment) {
            if($comment->getDocument()->getId() == $_GET['docComment']) {
                ?>
                <div class="un_commentaire">
                    <span class="date"><?=$comment->getDate() . "# </span>" . $comment->getUser()->getLastname() . " " . $comment->getUser()->getFirstname() . ": " . $comment->getCommentary()?>
                </div>
                <?php
            }
        }
        echo '</div>';
        ?>
        <form action="../create.php?error=0&document=<?=$doc->getId()?>&doc=<?=$_GET['doc']?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="commentary">Commentaire: </label>
                <input type="text" name="commentary" id="commentary" required>
            </div>
            <div class="account_options">
                <div>
                    <button type="submit">Confirmer</button>
                </div>
            </div>
        </form>
    </div>
    <?php
}