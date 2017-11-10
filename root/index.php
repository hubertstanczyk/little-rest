<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);



define('CONFIG_PATH',__DIR__.'/../application/config/main.php');

require(__DIR__.'/../application//vendor/autoload.php');
require(__DIR__.'/../application/src/Core.php');

Core::init();
