<?php
if( isset($_POST['title']) && isset($_POST['content']) && isset($_FILES)) {
    //------------------------------ADD ARTICLE FUNCTION---------------------------------------------------------------------------------------------------
    $title          = strip_tags($_POST['title']);                                                                                                      //- 
    $content        = strip_tags($_POST['content']);                                                                                                    //-
    $author         = getUserId($_SESSION["connexion"],$pdo);                                                                                           //-
                                                                                                                                                        //-
    if(!empty($_FILES)){                                                                                                                                //-             
        !file_exists("./files") ? mkdir("./files"):false;                                                                                               //- 
        $resultat   = move_uploaded_file($_FILES ["userfile"]['tmp_name'][0],"./files/".$_FILES["userfile"]['name'][0]);                                //-
        echo $resultat ? ''/*'Le transfert de '.$_FILES["userfile"]['name'][0].' à réussi'*/ : '';                                                      //-
        $path       = "./files/".$_FILES["userfile"]['name'][0];                                                                                        //-
    }                                                                                                                                                   //- 
    $query          = 'INSERT INTO article (`title`, `content`,`author`,`image`) VALUES (:title, :content, :author, :articleimage)';                    //-
    $statement      = $pdo->prepare($query);                                                                                                            //- 
    $status         = $statement->execute([':title' => strtoupper($title), ':content' => $content, ':author' => $author,':articleimage' => $path]);     //-
    echo !$status   ? error_input():'<span class="badge badge-success">Article add with Success !</span>';                                                                                                                 //- 
    //--------------------------------------------------------------------------------------------------------------------------------------------------//- 
}
?>
    <label>NEW ARTICLE</label>
    <form action = "index.php?action=newarticle" method="post" enctype="multipart/form-data">
        <input type="text" name="title" required="required" placeholder="Title"/>
        <textarea name="content" rows="12" cols="90" required="required" placeholder="Tape something"></textarea>
        <input type="file" name="userfile[]" />
        <input type="submit">
    </form>
   <!-- <textarea class="form-control" rows="10"><?php print_r($_FILES)?></textarea> -->
</div><!-- container -->
</body>
<hr><hr>