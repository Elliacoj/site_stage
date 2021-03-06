<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/require.php";

$commentaries = new CommentaryController();
$commentaries = $commentaries->getCommentary();

$date = strtotime("1 month ago");

if(($_SERVER['REQUEST_URI'] !== "/site_stage/view/index.php") && (isset($_SESSION['id']) === false)) {
    header("location: ./index.php");
}

foreach ($commentaries as $commentary) {
    if($date > strtotime($commentary->getDate())) {
        $del = new CommentaryController();
        $del->deleteCommentary($commentary->getId());
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f8e4a7ab95.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./elements/NG_LOGO.ico">
    <link href="./styles/commun.css" rel="stylesheet">
    <link id="pages_style" href="./styles/light.css" rel="stylesheet">
    <link href="./styles/mobile_version.css" rel="stylesheet">
</head>

<body>

    <div id="body_container">

<?php
    include './elements/menu.php';
?>