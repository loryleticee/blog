<?php
include "conect.php";  

if(isset($_GET['action'])){
    $action = strip_tags($_GET['action']).'Action';
}

if(!isset($_GET['action'])){
    $action = "loginAction";
}

echo $action($pdo);

function subscribeAction($pdo){
    include "Form/FormUser.php";
}

function logoutAction($pdo){
    include "View/disconect.php";
}

function loginAction($pdo){
    include "Form/FormConect.php";
}



?>