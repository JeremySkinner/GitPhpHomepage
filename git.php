<?php
require 'config.php';

class Repository {
	function __construct($name) {
		$this->name = $name;
	}
	
	function getName() {
		return $this->name;
	}
	
	function getUrl() {
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
	
		$path = $_SERVER["REQUEST_URI"];
		$script = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	
		$path = str_replace($script, "", $path);
		$path .= $this->name;
	
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$path;
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$path;
		}
		return $pageURL;
	}
}

function getRepositories() {
	global $config;
	$repoDirectory = $config["REPOSITORY_ROOT"];
	$dir = opendir($repoDirectory);
	
	$repos = array();
	
    while (($file = readdir($dir)) !== false) {
		if ($file == '.' || $file == '..') continue;
		array_push($repos, new Repository($file));
    }
    closedir($dir);
	
	return $repos;
}



function executeGit($cmd) {
	global $config;
	$gitexe = $config["GIT_EXECUTABLE"];
	
	$cmd = $gitexe . " " . $cmd;
	$output = null;
	exec($cmd, $output);
	return $output;
}

function createRepository($repository, $allowAnonymousPushes) {
	global $config;
	$repoDirectory = $config["REPOSITORY_ROOT"];
	$path = "$repoDirectory/$repository.git";
	
	if(! file_exists($path)) {
		executeGit("init --bare $path");
		chdir($path);
		executeGit("config http.receivepack true");
	}
}



?>