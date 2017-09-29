<?php

/*
 Plugin Name: MT4 Form 
 Description: Opening an account
 Plugin URI: //
 Version: 1.0
 Author: AJ
 Author URI: //
*/

//ini_set('display_errors', '1');
//ini_set('error_reporting', E_ALL);

// Stop direct call
if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
    die('You are not allowed to call this page directly.');
}

$currentDir = dirname(__FILE__);

define('MT4_EXEC_FILE', __FILE__);
define('MT4_DIR', $currentDir);
define('MT4_DIR_CLASS', $currentDir . '/class/');
define('MT4_DIR_TEMPLATES', $currentDir . '/templates/');
define('MT4_DIR_CSS', plugins_url() .'/'. plugin_basename(MT4_DIR) . '/css/');
define('MT4_DIR_JS', plugins_url() .'/'. plugin_basename(MT4_DIR) . '/js/');
if (!class_exists('MT4')) {

    include  MT4_DIR_CLASS  . 'MT4.php';

    global $MT4;
    $MT4 = new MT4();
}?>