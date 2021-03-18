<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

if(isset($_POST['checkId'])) {
    $id = strip_tags(trim($_POST['checkId']));
    $check = strip_tags(trim($_POST['checkValue']));

    $category = new CategoryController();
    $category->updateCategory("default_visibility", $check, $id);
}