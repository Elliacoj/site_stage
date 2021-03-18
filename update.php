<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

if(isset($_POST['checkId'])) {
    $id = strip_tags(trim($_POST['checkId']));
    $check = strip_tags(trim($_POST['checkValue']));
    $table = strip_tags(trim($_POST['checkTable']));
    $controller = $table . "Controller";
    $update = "update" . $table;
    $category = new $controller();
    $category->$update("default_visibility", $check, $id);
}