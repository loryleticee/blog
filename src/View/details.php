<div class='alert alert-dismissible alert-primary'><?php

    if(isset($_GET['id']) && isset($_POST['coment'])):
        $status         = addCom($_POST['username'],$_POST['coment'],$_GET['id'] ,$pdo);
        echo $status != false ? '': error_input();
    endif;

    if(isset($_GET['id'])):

        $article = getArticle($_GET['id'],$pdo);?>
        
            <?php
                foreach($article as $item){?>
                    <tr>
                        <div class="card text-white bg-dark mb-3" style="max-width: 40rem;">
                            <div class="card-header"><?php if($item['image']!= './files/'){?> <img width='600' heigth='300' src= <?= $item['image'] ?>><?php }?></div>
                            <div class="card-body">
                                <h4 class="card-title"><?=$item['title']?></h4>
                                <p class="card-text"><?=$item['content']?></p>
                            </div>
                        </div>
                    </tr><?php
                }
                if(isset($item)){
                    $coms   = getComs($item['id'],$pdo);
                }
                ?>
                <tr>
                    <?php
                    if(isset($coms)){
                        foreach($coms as $aCom){?>
                            <span class="badge badge-pill badge-light">
                                <?php echo $aCom['username'];?>
                            </span>
                            <br>
                            <div class="alert alert-dismissible alert-warning">
                                <?php echo $aCom['content'];?>
                            </div><?php
                        }
                    }else{?>
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Be the first!</strong> There are not yet <a href="#username" class="alert-link">coment</a>, but it's not super important.
                        </div><?php  
                    }?>
                </tr>
    <?php
    endif;
    ?>
        <div class="container">
            <form action="index.php?action=more&id=<?=$_GET['id'];?>" method="POST" >
                <div class="form-group row">
                    <input type="text" name="username" id="username" required="required" placeholder="Name">
                </div>
                <div class="form-group row">
                    <textarea name="coment" rows="3" cols="40" required="required" placeholder="Tape something"></textarea>
                </div>
                <button class="btn btn-info" type="submit">Post</button>
            </form>
        </div>
</div>

