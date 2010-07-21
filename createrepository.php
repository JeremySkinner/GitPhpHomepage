<?php
require "config.php";
require "git.php";

$repository = $_POST["project"];

if($repository) {
	CreateRepository($repository);
}

header('location: index.php');
?>