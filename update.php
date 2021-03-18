<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

if(isset($_POST['nameTitle'])) {
    $name = trim($_POST['nameTitle']);
    $check = $_POST['checkValue'];

    $category = new CategoryController();
    $category->updateCategory("default_visibility", $check, $name);
}