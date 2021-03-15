<?php
require_once "require.php";

$categories = new DocumentController();

echo "<pre>";
print_r($categories->getDocument());
echo "</pre>";

$data = "null, 'Jocaille', 'Amaury', 'azerty', 'sfzef@gmail.com', '2'";
$newUser = new UserController();
$newUser->addUser($data);
