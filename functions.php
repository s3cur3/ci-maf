<?php

$theme_dir = dirname(__FILE__) . "/";
require_once $theme_dir . 'lib/core/core-includes.php';
require_once $theme_dir . 'lib/free/free-includes.php';
if(file_exists($theme_dir . "lib/premium/premium-includes.php")) {
    require_once $theme_dir . 'lib/premium/premium-includes.php';
} else {
    require_once $theme_dir . 'lib/premium-stubs/premium-stubs-includes.php';
}

