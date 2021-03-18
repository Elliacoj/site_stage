<?php
require_once "require.php";
if(isset($_GET['table'], $_GET['error']) && $_GET['error'] == 0) {
    if(isset($_POST['mail'])) {
        $search = new UserController();
        if($search->logUser($_POST['mail'])) {
            // adresse mail existante
            header("location: ./view/administration.php?error=2");
        }
    }

    $data = $_POST;
    $checkData = "null";
    foreach ($data as $item => $value) {
        $check = strip_tags(trim($value));
        if($item === "password") {
            $check = password_hash($check, PASSWORD_BCRYPT);
        }
        $checkData .= ", '" . $check . "'";
    }

    $controller = $_GET['table'] . "Controller";
    $newUser = new $controller();

    $state = $newUser->addUser($checkData);
    if($state) {
        // utilisateur bien enregistré
        header("location: ./view/administration.php?error=0");
    }
    else {
        // erreur dans l'enregistrement
        header("location: ./view/administration.php?error=1");
    }
}

