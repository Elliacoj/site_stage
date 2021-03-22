<?php
require_once "require.php";

if(isset($_GET['id'], $_GET['table'])) {
    $id = strip_tags(trim($_GET['id']));
    $table = strip_tags(trim($_GET['table']));

    $item = $table . "Controller";
    $item = new $item();

    if($table === "Document") {
        $doc = $item->searchDocument($id);
        $link = $doc->getLink();
        $file = $doc->getItem();
        unlink($root . "/file/" . $file . "/" . $link);
    }

    $delete = "delete" . $table;
    $item->$delete($id);



    header("location: ./view/" . $_GET['doc'] . "?error=0");
}
