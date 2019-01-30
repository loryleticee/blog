 
 <?php
  if( isset($_POST['pseudo']) && isset($_POST['password'])) {
    $pseudo           = testData($_POST['pseudo']);
    $password         = testData($_POST['password']);
    $aData            = login($pseudo,$password,$pdo);
    if(count($aData) > 0 ){
      $check          = password_verify($password,$aData['password']);
      if($check){
        $_SESSION["connexion"]=$pseudo;
        echo '<script language="Javascript">  document.location.replace("./"); </script>'; 
      }
      if(!$check){
        echo "<span class='badge badge-danger'>Your password is incorrect</span>";
      }
    }
    if(empty($aData)){
      echo "<span class='badge badge-danger'>We cannot find an account with this pseudoname</span>";
    }
              
  }
?>
<br><br><br><br>
<div class="jumbotron">
  <div class="card-header text-center">SIGNIN</div>  
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
      <div class="form-group">
        <label for="pseudo" >Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Tape your pseudo" required="required"  >
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password"  placeholder="Tape your password" required="required">
        <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
      </div>
      <button class="btn btn-info" type="submit">Log In</button>
    </form>   
</div>