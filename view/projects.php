<?php
include './elements/header.php';

?>
    <link href="./styles/sections_style.css" rel="stylesheet">
    <link href="./styles/admin_page.css" rel="stylesheet">
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] === '0') {
        echo '<div id="error_no_problem">La base de données a été mise à jour!</div>';
    }
    else if ($_GET['error'] === '1') {
        echo '<div id="error_problem">Un problème est survenu!</div>';
    }
    else if ($_GET['error'] === '2') {
        echo '<div id="error_problem">Ce document existe déjà!</div>';
    }
    else if ($_GET['error'] === '4') {
        echo "<div id='error_problem'>L'envoi du message a échoué!</div>";
    }
}

$categories = new CategoryController();
$categories = $categories->secCategory("1");

echo '<h2>Section Bac +2</h2>';

foreach($categories as $category) {
    $documents = new DocumentController();
    $documents = $documents->secDocument($category->getId());
    $check = "";
    if($category->getDefault_visibility() === 1) {
        $check = "checked";
    }
    if(((isset($_SESSION['role']) && $_SESSION['role'] === "apprenant_t2") && $check === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] !== "apprenant_t2")) {
?>
        <div class="section_type">
            <div class="section_information">
                <div class="section_tittle"><?= $category->getName()?>
                    <i class="fas fa-plus-square section_show_more"></i>
                </div>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
                <div class="section_option">
                    <a href="projects.php?docCreate=1&category=<?= $category->getId()?>&item=projet&doc=projects.php"><i class="fas fa-folder-plus section_add_document"></a></i>
                </div>
                <?php } ?>
            </div>

            <?php
            foreach($documents as $document) {
                $checkDoc = "";
                if($document->getDefault_visibility() === 1) {
                    $checkDoc = "checked";
                }

                if(((isset($_SESSION['role']) && $_SESSION['role'] === "apprenant_t2") && $checkDoc === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] !== "apprenant_t2")) {
                    if(($document->getCategory() === $category->getName()) && ($document->getItem() === "projet")) {
                        ?>
                        <div class="section_documents">
                            <div class="section_documents_item">
                                <div class="section_documents_item_tittle">
                                    <a class="linkDoc" href="" data-href="<?= $document->getLink()?>" data-type="projet" target="_blank"><?= $document->getTitle()?></a>
                                </div>
                                <a href="projects.php?docComment=<?= $document->getId()?>&doc=projects.php"><i class="fas fa-comment-dots message"></i></a>
                                <div class="section_show_button">
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
                                        <a href="projects.php?docModif=<?= $document->getId()?>&doc=projects.php"><button>Modifier</button></a>
                                        <button class="button_delete" data-doc="projects.php" value="<?= $document->getId()?>">X</button>
                                        <label class="section_show_label">
                                            <?php
                                            if(strpos($document->getLink(), 'https') === 0) {
                                                $url = $document->getLink();
                                            }
                                            else {
                                                $url = urlencode($_SERVER['HTTP_HOST'] . $rootHtml . "/file/" . $document->getItem() . "/" .$document->getLink());
                                            }
                                            ?>
                                            <input type="checkbox" class="show_button botUpdate" data-link="<?= $url ?>" value="<?= $document->getId()?>" <?= $checkDoc?>>
                                            <span class="section_checkmark"></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
<?php
    }
}

$categories = new CategoryController();
$categories = $categories->secCategory("2");

if(isset($_SESSION['role']) && $_SESSION['role'] !== "apprenant_t2") {
    echo '<h2>Section Bac +4</h2>';
}

foreach($categories as $category) {
    $documents = new DocumentController();
    $documents = $documents->secDocument($category->getId());
    $check = "";
    if($category->getDefault_visibility() === 1) {
        $check = "checked";
    }
    if(((isset($_SESSION['role']) && $_SESSION['role'] === "apprenant_t4") && $check === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] !== "apprenant_t2" && $_SESSION['role'] !== "apprenant_t4")) {
        ?>
        <div class="section_type">
            <div class="section_information">
                <div class="section_tittle"><?= $category->getName()?>
                    <i class="fas fa-plus-square section_show_more"></i>
                </div>
                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
                    <div class="section_option">
                        <a href="projects.php?docCreate=1&category=<?= $category->getId()?>&item=projet&doc=projects.php"><i class="fas fa-folder-plus section_add_document"></a></i>
                    </div>
                <?php } ?>
            </div>

            <?php
            foreach($documents as $document) {
                $checkDoc = "";
                if($document->getDefault_visibility() === 1) {
                    $checkDoc = "checked";
                }

                if(((isset($_SESSION['role']) && $_SESSION['role'] === "apprenant_t4") && $checkDoc === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] !== "apprenant_t2" && $_SESSION['role'] !== "apprenant_t4")) {
                    if(($document->getCategory() === $category->getName()) && ($document->getItem() === "projet")) {
                        ?>
                        <div class="section_documents">
                            <div class="section_documents_item">
                                <div class="section_documents_item_tittle">
                                    <a class="linkDoc" href="" data-href="<?= $document->getLink()?>" data-type="projet" target="_blank"><?= $document->getTitle()?></a>
                                </div>
                                <a href="projects.php?docComment=<?= $document->getId()?>&doc=projects.php"><i class="fas fa-comment-dots message"></i></a>
                                <div class="section_show_button">
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
                                        <a href="projects.php?docModif=<?= $document->getId()?>&doc=projects.php"><button>Modifier</button></a>
                                        <button class="button_delete" data-doc="projects.php" value="<?= $document->getId()?>">X</button>
                                        <label class="section_show_label">
                                            <?php
                                            if(strpos($document->getLink(), 'https') === 0) {
                                                $url = $document->getLink();
                                            }
                                            else {
                                                $url = urlencode($_SERVER['HTTP_HOST'] . $rootHtml . "/file/" . $document->getItem() . "/" .$document->getLink());
                                            }
                                            ?>
                                            <input type="checkbox" class="show_button botUpdate" data-link="<?= $url ?>" value="<?= $document->getId()?>" <?= $checkDoc?>>
                                            <span class="section_checkmark"></span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <?php
    }
}
include "./elements/footer.php";
?>