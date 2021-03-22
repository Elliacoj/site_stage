<?php
require_once "require.php";

function create($provide) {
    $data = $_POST;
    $checkData = "null";
    foreach ($data as $item => $value) {
        $check = strip_tags(trim($value));
        if($item === "password") {
            $check = password_hash($check, PASSWORD_BCRYPT);
        }
        $checkData .= ", '" . $check . "'";
    }
    if($_GET['table'] === "Document") {
        $checkData .= ", '0'";
    }

    $controller = $_GET['table'] . "Controller";
    $new = new $controller();
    $add = "add" . $_GET['table'];
    print_r($checkData);
    $state = $new->$add($checkData);
    if($state) {
        // utilisateur bien enregistré
        header("location: ./view/" . $provide . "?error=0");
    }
    else {
        // erreur dans l'enregistrement
        header("location: ./view/" . $provide . "?error=1");
    }
}

if(isset($_GET['table'], $_GET['error']) && $_GET['error'] == 0 && $_GET['table'] == "User") {
    if(isset($_POST['mail'])) {
        $search = new UserController();
        if($search->logUser($_POST['mail'])) {
            // adresse mail existante
            header("location: ./view/administration.php?error=2");
        }
    }

    create("administration.php");
}

if(isset($_GET['table'], $_GET['error']) && $_GET['error'] == 0 && $_GET['table'] == "Document") {

    if($_FILES['file']['error'] == "0") {
        $tmp_name = $_FILES['file']['tmp_name'];
        $itemName = new ItemController();
        $itemName = $itemName->searchItem($_POST['item_fk']);

        if(file_exists($root . "/file/" . $itemName->getName() . "/" . $_POST['link'])) {
            header("location: ./view/" . $_GET['doc'] . "?error=1");
        }
        else {
            move_uploaded_file($tmp_name, $root . "/file/" . $itemName->getName() . "/" . $_POST['link']);

            create($_GET['doc']);
            header("location: ./view/" . $_GET['doc'] . "?error=0");
        }
    }
    else {
        create($_GET['doc']);
    }
}

