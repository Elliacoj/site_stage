<?php
require_once "require.php";

$user = new UserController();
$user = $user->deleteUser($_GET['id']);
header("location: ./view/administration.php?error=0");