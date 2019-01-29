 
 <?php
  if( isset($_POST['pseudo']) && isset($_POST['password'])) {
    $pseudo         = strip_tags($_POST['pseudo']);
    $password       = strip_tags($_POST['password']);
    $query          = 'SELECT password FROM user WHERE username =:pseudo';
    $statement      = $pdo->prepare($query);
    $statement->execute([':pseudo' => "$pseudo"]);
    $aData          = $statement->fetch(PDO::FETCH_ASSOC);
    if($aData){
      $check          = password_verify($password,$aData['password']);
      if($check){ 
        $_SESSION["connexion"]=$pseudo;
        echo '<script language="Javascript">  document.location.replace("./"); </script>'; 
      }
      if(!$check){
        echo "<span class='badge badge-danger'>Your password is incorrect</span>";
      }
    }
    if(!$aData){
      echo "<span class='badge badge-danger'>We cannot find an account with this pseudoname</span>";
    }
              
  }
?>
<br><br><br><br>
<div class="jumbotron">
  <div class="card-header text-center">SIGNIN</div>  
  <form action="index.php?action=login" method="post">
    <div class="form-group">
      <label for="pseudo" >Pseudo</label>
      <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Tape your pseudo" required="required"  >
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password"  placeholder="Tape your password" required="required">
      <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
    </div>
    <button class="btn btn-success" type="submit">Log In</button>
  </form>   
</div>