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
        <title>My Blog</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.css" >
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <header class="text-center">
        <?php
            require "header.php";   
        ?>
    </header>

    <?php
        require "script/function.php";
        require "script/manager.php";
    ?>
    <body>
        <?php
            require "content.php";
        ?>
    </body>
        <?php
            include "footer.php";
        ?>
