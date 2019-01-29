<?php declare(strict_types=1);
    session_start();

    $date_of_expiry = time() + 600 ;
    setcookie("connexion","anonymous", $date_of_expiry );

    if(!isset($_COOKIE['connexion'])){
        if(isset($_SESSION['connexion'])){
            unset($_SESSION["connexion"]);
            ?>
            <script>
                alert("Vous avez été déconnecté");
            </script>
            <?php
        }
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <?php
            require "head.php"; 
        ?>
    </head>
    <header class="text-center">
        <?php
            require "header.php";   
        ?>
    </header>

    <?php
        require "function.php";
        require "manager.php";
    ?>
    <body>
        <?php
            require "content.php";
        ?>
    </body>