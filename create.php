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
    if($_GET['table'] === "Document" || $_GET['table'] === "Category") {
        $checkData .= ", '0'";
    }

    $controller = $_GET['table'] . "Controller";
    $new = new $controller();
    $add = "add" . $_GET['table'];
    $state = $new->$add($checkData);
    if($state) {
        // utilisateur bien enregistrĂ©
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
    $itemName = new ItemController();
    $itemName = $itemName->searchItem($_POST['item_fk']);

    if($_FILES['file']['error'] == "0") {

        if(file_exists($root . "/file/" . $itemName->getName() . "/" . $_POST['link'])) {
            header("location: ./view/" . $_GET['doc'] . "?error=2");
        }
        else {
            $tmp_name = $_FILES['file']['tmp_name'];

            move_uploaded_file($tmp_name, $root . "/file/" . $itemName->getName() . "/" . $_POST['link']);
            create($_GET['doc']);

            header("location: ./view/" . $_GET['doc'] . "?error=0");
        }
    }
    else if($_FILES['file']['error'] !== "0"){
        create($_GET['doc']);
        header("location: ./view/" . $_GET['doc'] . "?error=0");
    }
}

if(isset($_GET['error'], $_POST['name']) && $_GET['error'] === "0") {
    create("administration.php");
}

if(isset($_GET['error'], $_POST['commentary']) && $_GET['error'] === "0") {
    $checkData = "'" . addslashes(strip_tags(trim($_POST['commentary']))) . "'";
    $checkData .= ", '" . strip_tags(trim($_SESSION['id'])) . "'";
    $checkData .= ", '" . strip_tags(trim($_GET['document'])) . "'";

    $new = new CommentaryController();
    $state = $new->addCommentary($checkData);

    if($state) {
        // utilisateur bien enregistrĂ©
        header("location: ./view/" . $_GET['doc'] . "?docComment=$_GET[document]&doc=$_GET[doc]");
    }
    else {
        // erreur dans l'enregistrement
        header("location: ./view/" . $_GET['doc'] . "?error=4&docComment=$_GET[document]&doc=$_GET[doc]");
    }
}

if(isset($_GET['error'], $_POST['message_home']) && $_GET['error'] === "0") {
    $message = addslashes(strip_tags(trim($_POST['message_home'])));

    $message_home = new Message_homeController();
    $message_home->deleteMessage_home();
    $message_home->addMessage_home($message);

    header("location: ./view/administration.php?error=0");
}