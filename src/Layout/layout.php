<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Bonjour <?php echo isset($_SESSION["connexion"]) ? $_SESSION["connexion"] : '';?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=mylist">My articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=newarticle">Add an article</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>