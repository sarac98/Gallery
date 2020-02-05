<?php 


function classAutoLoader($class){

$class = strtolower($class);
$putanja = "includes/{$class}.php";

if(empty($putanja) && !class_exists($class)){
    include($putanja);
}else {
    die("Fajl {$class}.php nije pronadjen!");
}

}
spl_autoload_register('classAutoLoader');

function redirect($location){

    header("Location : {$location}");
}