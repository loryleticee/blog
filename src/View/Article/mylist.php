<?php
if( isset($_POST['title']) && isset($_POST['content']) && isset($_POST['idArticle'])) {
    $data        = ModifyArticle($_POST['title'],$_POST['content'],$_POST['idArticle'],$pdo);
    $data        ? great_input() : false ;
}
if( isset($_POST['delete']) ) {
    $data        = deleteArticle($_POST['delete'],$pdo,true);
    $data        ? great_input() : false ;
}?>
<div class="alert alert-dismissible alert-primary">
<table>
    <?php 
    $author     = getUserId($_SESSION["connexion"],$pdo);
    $articles   = getArticleByUser($author,$pdo);
    if($articles){
       foreach($articles as $data) {?>
            <tr>
            <p><img width='100' heigth='100' src="<?=$data['image']?>" /> </p>
                <form action="index.php?action=mylist" method="POST">
                    <input type="text" class="alert alert-dismissible alert-secondary" name="title" size="65" value="<?php echo $data['title'];?>">
                    <br>
                    <input type="hidden" name="idArticle" value=<?php echo $data['id'];?>>
                    <textarea name="content" rows="15" cols="73" required="required"><?php echo $data['content'];?></textarea>
                    <button class="btn btn-info" type="submit">Save</button>
                </form>
                <form action="index.php?action=mylist" method="POST">
                    <input type="hidden" name="delete" value=<?php echo $data['id'];?>>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

            </tr>
            <hr><?php
        }
    }else{?>
        <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Heads up!</strong> You have not yet <a href="./index.php?action=newarticle" class="alert-link">created article</a>, but it's not super important.
        </div><?php  
    }?>
</table>
</div>