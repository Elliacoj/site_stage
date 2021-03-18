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
                <div class="section_tittle"><?= $category->getName()?></div>
                <div class="section_show_button">
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
                        <label class="section_show_label">
                            <input type="checkbox" class="show_button" value="<?= $category->getId()?>" <?= $check?>>
                            <span class="section_checkmark"></span>
                        </label>
                    <?php } ?>
                </div>
            </div>
            <div>
                <button class="section_show_more">Voir +</button>
            </div>

            <?php
            foreach($documents as $document) {
                $checkDoc = "";
                if($document->getDefault_visibility() === 1) {
                    $checkDoc = "checked";
                }

                if(((isset($_SESSION['role']) && $_SESSION['role'] !== "administrateur") && $checkDoc === "checked") || (isset($_SESSION['role']) && $_SESSION['role'] === "administrateur")) {
                    if(($document->getCategory() === $category->getName()) && ($document->getItem() === "exo")) {
                        ?>
                        <div class="section_documents">
                            <div class="section_documents_item">
                                <div class="section_documents_item_tittle"><?= $document->getTitle()?></div>
                                <div class="section_show_button">
                                    <button><i class="fas fa-file-download"></i></button>
                                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "administrateur") {?>
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
