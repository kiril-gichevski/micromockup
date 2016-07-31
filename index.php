<?php
include_once 'vendor/autoload.php';
include_once 'src/config/router.php';

$requestUrl = $_SERVER['REQUEST_URI'];
$requestUrlArray = explode('/', ltrim($requestUrl, '/'));

$class = 'page';
if (isset($requestUrlArray[0]) && $requestUrlArray[0] !== "") {
    $class = $requestUrlArray[0];
}

$action = "index";
if (isset($requestUrlArray[1]) && $requestUrlArray[1] !== ""){
    $action = $requestUrlArray[1];
}
$arguments = array_slice($requestUrlArray, 2);

if (isset($map[$class])) {
    $object = new $map[$class]();
    if (method_exists($object, $action)) {
        call_user_func_array(array($object,$action), $arguments);
        return;
    }
}

include_once '404.php';
