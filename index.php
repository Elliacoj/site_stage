<?php
require_once "require.php";

$categories = new UserController();


$user = $categories->logUser("aml@hotmail.com");


    echo $user->getRole();

