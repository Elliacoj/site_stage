<?php
require_once "require.php";
if(isset($_POST['error'], $_POST['data'], $_POST['table']) && $_POST['error'] === "0") {
    $data = base64_decode(json_decode($_POST['data']));
    $checkData = "null";
    foreach ($data as $item) {
        $check = strip_tags(trim($item));
        $checkData .= ", '" . $check . "'";
    }

    $controller = base64_decode(json_decode($_POST['table'])) . "Controller";
    $newUser = new $controller();
    $newUser->addUser($checkData);
}