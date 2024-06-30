#!/usr/bin/env php
<?php

ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE ^ E_WARNING);

// APP_RUNNING is for not allowing direct access to application files.
define('APP_RUNNING', true);

// APP_FOLDER is the root folder of application
$appFolder = __DIR__;
define('APP_DIR', $appFolder);

session_start();

require __DIR__ .'/vendor/autoload.php';

\Lkt\Commander\Commander::run();