<?php
if(isset($_SESSION['connexion'])){

    require "layout.php";

}

if(!isset($_SESSION['connexion'])){

    require "subsribeLayout.php";
    
}?>

