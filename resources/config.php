<?php
/*
    This config file should be included in every page of this project, 
	or at least any page you want access to these settings.
    This allows to confidently use these settings throughout the project because
    if something changes you'll only need to update it here.
*/
 
$config = array(
    "urls" => array(
        "baseUrl" => "http://localhost"
    ),
    "paths" => array(
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/img/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/img/layout"
        )
    ),
	"titles" => array(
		"index" => "PHP Hub",
		"login" => "Login",
		"signup" => "Sign up for an account",
		"logout" => "Logout",
		"addproject" => "Add a new project",
		"project" => "Project page",
		"error" => "Oops! Something went wrong"
	)
);

/*
    Creating constants for heavily used paths makes things a lot easier.
    ex. require_once(LIBRARY_PATH . "library_file.php")
*/
defined("PAGES_PATH")
    or define("PAGES_PATH", realpath(dirname(__FILE__) . '/pages'));
     
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));
 
/*
    Error reporting.
*/
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);
?>