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
function add($title, $value, $table){
    if($value !== "") {
        $item = $table . "Controller";
        $item = new $item();
        $update = "update" . $table;
        $item->$update($title, $value, $_GET['id']);
    }
}

if(isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'])) {
    $firstname = strip_tags(trim($_POST['firstname']));
    $lastname = strip_tags(trim($_POST['lastname']));
    $mail = strip_tags(trim($_POST['mail']));
    $role = strip_tags(trim($_POST['role']));
    $password = strip_tags(trim($_POST['password']));

    foreach ($_POST as $item => $value) {
        add($item,$value, "User");
    }

    header('location: ./view/administration.php?error=0');
}

if(isset($_POST['title'], $_FILES['file'])) {
    $title = strip_tags(trim($_POST['title']));
    $link = strip_tags(trim($_POST['link']));
    $category = strip_tags(trim($_POST['category_fk']));
    $item = strip_tags(trim($_POST['item_fk']));
    $file = $_FILES['file'];

    if($_FILES['file'] !== null){
        $document = new DocumentController();
        $document = $document->searchDocument(strip_tags(trim($_GET['id'])));
        $item = $document->getItem();
        $root = $root . "/file/" . $item . "/" . $document->getLink();

        if(file_exists($root)) {
            unlink($root);
            $tmp_name = $_FILES['file']['tmp_name'];
            if($_POST['link'] !== null) {
                move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/" .$item . "/" . $_POST['link']);
            }
            else {
                move_uploaded_file($tmp_name, $root);
            }
        }
        else {
            $tmp_name = $_FILES['file']['tmp_name'];
            if($_POST['link'] !== null) {
                move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/file/" .$item . "/" . $_POST['link']);
            }
            else {
                move_uploaded_file($tmp_name, $root);
            }
        }
    }
    foreach ($_POST as $item => $value) {
        add($item, $value, "Document");
    }

    header('location: ./view/course.php?error=0');
}