<div class='alert alert-dismissible alert-primary'><?php

    if(isset($_GET['id']) && isset($_POST['coment'])):
        $id = testData($_GET['id']);
        
        if(is_numeric($id)){
            if(!empty($_POST['username'] && $_POST['coment'])){
                $status         = addCom($_POST['username'], $_POST['coment'], $_GET['id'] ,$pdo);
                echo $status != false ? '': error_input();
            }else{
                error_input();
            }
        }
        if(!is_numeric($id)){
             error_input();
        }
    endif;

    if(isset($_GET['id'])):
        $id = testData($_GET['id']);
        $article = getArticle($id,$pdo);?>
        
            <?php
                foreach($article as $item){?>
                    <tr>
                        <div class="card text-white bg-dark mb-3" style="max-width: 40rem;">
                            <div class="card-header"><?php if($item['image']!= './files/'){?> <img width='600' heigth='300' src= <?= $item['image'] ?>><?php }?></div>
                            <div class="card-body">
                                <h4 class="card-title"><?=mb_strtoupper($item['title'])?></h4>
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
                        empty($coms) ? beFirstCom() : false ;
                    }else{
                        beFirstCom(); 
                    }?>
                </tr>
    <?php
    endif;?>
        <div class="container">
            <form action="index.php?action=more&id=<?=$id;?>" method="POST" >
                <div class="form-group row">
                    <input type="text" name="username" id="username" required="required" value="<?php echo isset($_SESSION["connexion"]) ? showPseudo() :'';?>" placeholder="Name">
                </div>
                <div class="form-group row">
                    <textarea name="coment" name="coment" rows="3" cols="40" required="required" placeholder="Tape something"></textarea>
                </div>
                <button class="btn btn-info" type="submit">Post</button>
            </form>
        </div>
</div>