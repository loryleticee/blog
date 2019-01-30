<?php
if( isset($_POST['title']) && isset($_POST['content']) && isset($_FILES)) {
    //------------------------------ADD ARTICLE FUNCTION---------------------------------------------------------------------------------------------------
    $title          = testData($_POST['title']);                                                                                                      //- 
    $content        = testData($_POST['content']);
    if(!empty($title) && !empty($content)){
        $author         = getUserId(testData($_SESSION["connexion"]),$pdo);                                                                                           //-
                                                                                                                                                        //-
        if(!empty($_FILES)){                                                                                                                                //-             
            !file_exists("./files") ? mkdir("./files"):false;                                                                                               //- 
            $resultat   = move_uploaded_file($_FILES ["userfile"]['tmp_name'][0],"./files/".$_FILES["userfile"]['name'][0]);                                //-
            echo $resultat ? ''/*'Le transfert de '.$_FILES["userfile"]['name'][0].' à réussi'*/ : '';                                                      //-
            $path       = "./files/".$_FILES["userfile"]['name'][0];                                                                                        //-
        }                                                                                                                                                   //- 
        $query          = 'INSERT INTO article (`title`, `content`,`author`,`image`) VALUES (:title, :content, :author, :articleimage)';                    //-
        $statement      = $pdo->prepare($query);                                                                                                            //- 
        $status         = $statement->execute([':title' => mb_strtoupper($title), ':content' => $content, ':author' => $author,':articleimage' => $path]);     //-
        echo !$status   ? error_input() : great_input();          
    }else{
        error_input();
    }                                                                                                //-
                                                                                                           //- 
    //--------------------------------------------------------------------------------------------------------------------------------------------------//- 
}
?>
<div class="alert alert-dismissible alert-primary">
    <label>NEW ARTICLE</label>
    <form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
        <input type="text" class="alert alert-dismissible alert-secondary" name="title" required="required" placeholder="Title"/>
        <textarea name="content" class="alert alert-dismissible alert-secondary" rows="20" cols="64" required="required" placeholder="Tape something"></textarea>
        <input type="file" class="alert alert-dismissible alert-info" name="userfile[]" />
        <input type="submit">
    </form>
<hr><hr>
</div>