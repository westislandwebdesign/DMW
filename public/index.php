<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @version  3.2.13
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 * @link     http://laravel.com
 */

// --------------------------------------------------------------
// Tick... Tock... Tick... Tock...
// --------------------------------------------------------------
define('LARAVEL_START', microtime(true));

// --------------------------------------------------------------
// Indicate that the request is from the web.
// --------------------------------------------------------------
$web = true;

// --------------------------------------------------------------
// Set the core Laravel path constants.
// --------------------------------------------------------------
// development
require '../paths.php';
//TODO: this needs to point to the laravel app path on live site
//require '../../larapps/dmw/paths.php';


// --------------------------------------------------------------
// Unset the temporary web variable.
// --------------------------------------------------------------
unset($web);

// --------------------------------------------------------------
// Launch Laravel.
// --------------------------------------------------------------
require path('sys').'laravel.php';