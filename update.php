<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

if(isset($_POST['checkId'])) {
    $id = trim($_POST['checkId']);
    $check = $_POST['checkValue'];

    $category = new CategoryController();
    $category->updateCategory("default_visibility", $check, $id);
}