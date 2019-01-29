
    <label>NEW ARTICLE</label>
    <form action="index.php?action=mylist" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title"/>
        <textarea name="content" rows="12" cols="90" placeholder="Tape something"></textarea>
        <input type="file" name="userfile[]" />
        <input type="submit">
    </form>
   <!-- <textarea class="form-control" rows="10"><?php print_r($_FILES)?></textarea> -->

<?php
/*
if($_FILES){
    !file_exists("../files") ? mkdir("../files"):false;
    $resultat = move_uploaded_file($_FILES ["userfile"]['tmp_name'][0],"../files/".$_FILES["userfile"]['name'][0]);
    echo $resultat ? 'Le transfert de '.$_FILES["userfile"]['name'][0].' à réussi' : 'Transfert avorté';
}*/