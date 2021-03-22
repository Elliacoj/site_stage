<?php
require_once "require.php";

if(isset($_GET['id'], $_GET['table'])) {
    $id = strip_tags(trim($_GET['id']));
    $table = strip_tags(trim($_GET['table']));

    $item = $table . "Controller";
    $item = new $item();
    $delete = "delete" . $table;
    $item->$delete($id);

    header("location: ./view/administration.php?error=0");
}
