<?php
require "config.php";
require "git.php";

$repository = $_POST["project"];
$allowAnonymousPushes = isset($_POST["allowAnonymousPushes"]);

if($repository) {
	createRepository($repository, $allowAnonymousPushes);
}

header('location: index.php');
?>