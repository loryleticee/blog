<?php
if(isset($_SESSION['connexion'])){

    require "Layout/layout.php";

}

if(!isset($_SESSION['connexion'])){

    require "Layout/subsribeLayout.php";
    
}?>

