<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

// Data for switch checkbox
if(isset($_POST['checkId'])) {
    $id = strip_tags(trim($_POST['checkId']));
    $check = strip_tags(trim($_POST['checkValue']));
    $table = strip_tags(trim($_POST['checkTable']));
    $controller = $table . "Controller";
    $update = "update" . $table;
    $category = new $controller();
    $category->$update("default_visibility", $check, $id);
}

/**
 * Add new value in choice table
 * @param $title
 * @param $value
 * @param $table
 */
function add($title, $value, $table){
    if($value !== "") {
        $item = $table . "Controller";
        $item = new $item();
        $update = "update" . $table;
        $item->$update($title, $value, $_GET['id']);
    }
}

// Data form for update user
if(isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'])) {
    $firstname = strip_tags(trim($_POST['firstname']));
    $lastname = strip_tags(trim($_POST['lastname']));
    $mail = strip_tags(trim($_POST['mail']));
    $role = strip_tags(trim($_POST['role']));
    $password = strip_tags(trim($_POST['password']));
    $search = new UserController();

    if($_POST['mail'] !== "" && $search->logUser($_POST['mail'])) {
        header("location: ./view/administration.php?error=2");
    }

    foreach ($_POST as $item => $value) {
        add($item,$value, "User");
    }

    header('location: ./view/administration.php?error=0');
}

// Data form for update document
if(isset($_POST['title'], $_FILES['file'])) {
    $title = strip_tags(trim($_POST['title']));
    $link = strip_tags(trim($_POST['link']));
    $category = strip_tags(trim($_POST['category_fk']));
    $item = strip_tags(trim($_POST['item_fk']));
    $file = $_FILES['file'];
    $document = new DocumentController();
    $document = $document->searchDocument(strip_tags(trim($_GET['id'])));
    $item = $document->getItem();
    $root = $root . "/file/" . $item . "/" . $document->getLink();

    if($_FILES['file']['error'] == "0"){
        if(file_exists($root)) {
            unlink($root);
            $tmp_name = $_FILES['file']['tmp_name'];
            if($link !== "") {
                move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/" .$item . "/" . $link);
            }
            else {
                move_uploaded_file($tmp_name, $root);
            }
        }
        else {
            $tmp_name = $_FILES['file']['tmp_name'];

            if($link !== "") {
                move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/file/" .$item . "/" . $link);
            }
            else {
                move_uploaded_file($tmp_name, $root);
            }
        }
    }
    else {
        if(is_file($root)) {
            if($link !== "") {
                rename($root, $_SERVER['DOCUMENT_ROOT'] . "/file/" .$item . "/" . $link);
            }
        }
    }

    foreach ($_POST as $item => $value) {
        add($item, $value, "Document");
    }

    header('location: ./view/' . $_GET['doc'] . '?error=0');
}