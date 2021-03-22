<?php
include './elements/header.php';
$categories = new CategoryController();
$categories = $categories->getCategory();

foreach($categories as $category) {
    $documents = new DocumentController();
    $documents = $documents->getDocument();
    $check = "";
    if($category->getDefault_visibility() === 1) {
        $check = "checked";
    }
    if(((isset($_SESSION['role']) && $_SESSION['role'] !== "administrateur") && $check === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] === "administrateur")) {
        ?>
        <link href="./styles/sections_style.css" rel="stylesheet">

        <div class="section_type">
            <div class="section_information">
                <div class="section_tittle"><?= $category->getName()?>
                    <i class="fas fa-plus-square section_show_more"></i>
                </div>
                <div class="section_option">
                    <a href="projects.php?docCreate=1&category=<?= $category->getName()?>&item=projet&doc=projects.php"><i class="fas fa-folder-plus section_add_document"></a></i>
                </div>
            </div>

            <?php
            foreach($documents as $document) {
                $checkDoc = "";
                if($document->getDefault_visibility() === 1) {
                    $checkDoc = "checked";
                }

                if(((isset($_SESSION['role']) && $_SESSION['role'] !== "administrateur") && $checkDoc === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] === "administrateur")) {
                    if(($document->getCategory() === $category->getName()) && ($document->getItem() === "projet")) {
                        ?>
                        <div class="section_documents">
                            <div class="section_documents_item">
                                <div class="section_documents_item_tittle">
                                    <a class="linkDoc" href="" data-href="<?= $document->getLink()?>" data-type="projet" target="_blank"><?= $document->getTitle()?></a>
                                </div>
                                <div class="section_show_button">
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
                                        <a href="projects.php?docModif=<?= $document->getId()?>&doc=projects.php"><button>Modifier</button></a>
                                        <button class="button_delete" data-doc="projects.php" value="<?= $document->getId()?>">X</button>
                                        <label class="section_show_label">
                                            <input type="checkbox" class="show_button" value="<?= $document->getId()?>" <?= $checkDoc?>>
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