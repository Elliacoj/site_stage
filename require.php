<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

$rootHtml = "/" . basename($_SERVER['DOCUMENT_ROOT']);
$rootHtml = str_replace("//", "/", $rootHtml);

require_once $root . "/Classes/DB.php";
require_once $root . "/Controller/ObjectController.php";
require_once $root . "/Entity/Role.php";
require_once $root . "/Entity/Category.php";
require_once $root . "/Entity/Item.php";
require_once $root . "/Entity/User.php";
require_once $root . "/Entity/Document.php";
require_once $root . "/Entity/Section.php";
require_once $root . "/Controller/CategoryController.php";
require_once $root . "/Controller/UserController.php";
require_once $root . "/Controller/ItemController.php";
require_once $root . "/Controller/RoleController.php";
require_once $root . "/Controller/DocumentController.php";
require_once $root . "/Controller/SectionController.php";



