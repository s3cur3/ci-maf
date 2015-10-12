<?php
header('Content-Type: application/json');

if(file_exists("../../../lib/premium/appearance/googleFonts.php")) {
    require_once "../../../lib/premium/appearance/googleFonts.php";
}

global $fontsJSON;
echo $fontsJSON;