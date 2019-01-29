<?php
    if( isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo             = strip_tags($_POST['pseudo']);
        $password           = strip_tags($_POST['password']);
        
        if($password){
            $status = subscribe($pseudo,$password,$pdo);
            if($status){
                $_SESSION["connexion"]=$pseudo;
                echo '<script language="Javascript">  document.location.replace("./index.php"); </script>';
            }else{ 
                error_input();
            }
        }else{
            echo "<span class='badge badge-danger'>We cannot granted an account with that password</span>";
            echo '<script language="Javascript">  document.location.replace("./index.php?action=subscribe"); </script>'; 
        }
    }
?>
<br><br><br><br>
<div class="jumbotron">
    <div class="card-header text-center">CREATE YOUR BLOG ACCOUNT</div>  
    <form action="index.php?action=subscribe" method="post">
        <div class="form-group">
            <label for="pseudo" >Pseudo  </label>
            <input class="form-control" id="pseudo" type="email" name="pseudo"  placeholder="Tape a pseudo" required="required">
        </div>
        <div class="form-group">
            <label for="password"> Password  </label>
            <input class="form-control" id="password" type="password" name="password" pattern=.{8,} placeholder="Tape a password" required="required">
            <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
        </div>
        <button class="btn btn-success" type="submit">Sign in</button>
    </form> 
</div>   

    <!-- display_errors=off
    log_error=opendir
    password_hash($string,PASSWORD_BCRYPT)    password_verify($string,$lehash a verif):bool -->