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
function add($title,$value){
    if($value !== "") {
        $user = new UserController();
        $user->updateUser($title, $value, $_GET['id']);
    }
}

if(isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'])) {
    $firstname = strip_tags(trim($_POST['firstname']));
    $lastname = strip_tags(trim($_POST['lastname']));
    $mail = strip_tags(trim($_POST['mail']));
    $role = strip_tags(trim($_POST['role']));
    $password = strip_tags(trim($_POST['password']));

    foreach ($_POST as $item => $value) {
        add($item,$value);
    }

    header('location: ./view/administration.php?error=0');
}