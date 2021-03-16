<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root . "/Classes/DB.php";
require_once $root . "/Controller/ObjectController.php";
require_once $root . "/Entity/Role.php";
require_once $root . "/Entity/Category.php";
require_once $root . "/Entity/Item.php";
require_once $root . "/Entity/User.php";
require_once $root . "/Entity/Document.php";
require_once $root . "/Controller/CategoryController.php";
require_once $root . "/Controller/UserController.php";
require_once $root . "/Controller/ItemController.php";
require_once $root . "/Controller/RoleController.php";
require_once $root . "/Controller/DocumentController.php";


