<?php
include './elements/header.php';

$categories = new CategoryController();
$categories = $categories->getCategory();

foreach ($categories as $category) {
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
                    <input type="checkbox" class="show_button" <?= $check?>>
                    <span class="section_checkmark"></span>
                </label>
                <?php } ?>
            </div>
        </div>
        <div>
            <button class="section_show_more">Voir +</button>
        </div>

        <!--Example:
        <div class="section_documents">
            <div class="section_documents_item">
                <div class="section_documents_item_tittle">TITTLE</div>
                <div class="section_show_button">
                    <button><i class="fas fa-file-download"></i></button>
                    <label class="section_show_label">
                        <input type="checkbox" class="show_button">
                        <span class="section_checkmark"></span>
                    </label>
                </div>
             </div>
        </div>
        -->
    </div>

<?php
    }
}
include "./elements/footer.php";
?>
