<?php
$file_url = "/file/projet/PHP_SQL_les_jointures.pdf";
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=" . basename($file_url) . "");
readfile($file_url);