<?php
include './elements/header.php';
?>
<link href="./styles/sections_style.css" rel="stylesheet">

<div class="course_type">
    <div class="course_information">
        <div class="course_tittle">Titre 1</div>
        <div class="course_show_button">
            <label class="course_show_label">
                <input type="checkbox" class="show_button">
                <span class="course_checkmark"></span>
            </label>
        </div>
    </div>
    <div>
        <button class="course_show_more">Voir +</button>
    </div>

    <!--Example:
    <div class="course_documents">
        <div class="course_documents_item">
            <div class="course_documents_item_tittle">TITTLE</div>
            <div class="course_show_button">
                <button><i class="fas fa-file-download"></i></button>
                <label class="course_show_label">
                    <input type="checkbox" class="show_button">
                    <span class="course_checkmark"></span>
                </label>
            </div>
         </div>
    </div>
    -->
</div>

<?php
include "./elements/footer.php";
?>
