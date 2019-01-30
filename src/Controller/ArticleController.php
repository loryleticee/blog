<?php
if(isset($_GET['action'])){
    $action = strip_tags($_GET['action']).'Action';
}

if(!isset($_GET['action'])){
    $action = "listAction";
}

$tabAction = ['newarticleAction','mylistAction','moreAction','listAction'] ;

echo in_array($action,$tabAction) ? $action($pdo) : listAction($pdo); ;

function mylistAction(object $pdo=null):void
{
    
    isset($_SESSION['connexion']) ? include "View/Article/mylist.php" : include "View/Article/list.php";
}

function moreAction(object $pdo=null):void
{
    include "View/Article/details.php";
}

function newarticleAction(object $pdo=null):void
{
    isset($_SESSION['connexion']) ? include "Form/Article/FormArticle.php" : include "View/Article/list.php";
}

function listAction(object $pdo=null):void
{
    include "View/Article/list.php";
}
?>