<?php
    require_once("getRacine.php");
    define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));
    
    include_once("$racine/controller/principal_controller.php");
