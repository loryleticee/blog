<?php
if(isset($_GET['action'])){
    $action = strip_tags($_GET['action']).'Action';
}

if(!isset($_GET['action'])){
    $action = "loginAction";
}

echo $action($pdo);

function subscribeAction($pdo){
    include "Form/User/FormUser.php";
}

function logoutAction($pdo){
    include "View/User/disconect.php";
}

function loginAction($pdo){
    include "Form/User/FormConect.php";
}



?>