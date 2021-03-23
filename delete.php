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
        if(file_exists($root . "/file/" . $file . "/" . $link)) {
            unlink($root . "/file/" . $file . "/" . $link);
        }
    }

    $delete = "delete" . $table;

    if($_GET['table'] === "Category") {
        $document = new DocumentController();
        $document = $document->catDocument($id);
        echo "1";
        if(count($document) !== 0) {
            header("location: ./view/" . $_GET['doc'] . "?error=3");
        }
        else {
            $item->$delete($id);
            header("location: ./view/" . $_GET['doc'] . "?error=0");
        }
    }

    if($item->$delete($id) === null) {
        header("location: ./view/" . $_GET['doc'] . "?error=0");
    }
}