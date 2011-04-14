<?php
require 'config.php';
require 'git.php';

$repositories = getRepositories();

include("view.php");