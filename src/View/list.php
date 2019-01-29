<table class="table table-hover">
    <?php
        $perPage        = 5;
        $nbrArticle     = getNbrArtcile($pdo);
        !isset($_GET['p']) ? $cPage= 1: $cPage= $_GET['p'];
        $articles       = getArticles($pdo,$cPage);
        if($nbrArticle && $articles){
            paginate($nbrArticle,$perPage);
            foreach($articles as $article){
        ?>
                <tr>
                    <div class= "jumbotron" >
                        <?php
                            echo  '<h1>'.$article['title'] .'</h1>';
                        ?>
                            
                            <div class="alert alert-dismissible alert-secondary">
                                <p>
                                    <?php
                                        echo substr($article['content'],0,250).'...';
                                    ?>
                                </p>
                            </div>
                            <?php if($article['image']!= './files/'){?>
                                    <img width='200' heigth='200' src=<?php echo $article['image']?>> 
                            <?php }?>
                            <button type="button" class="btn btn-info"><a href="index.php?action=more&id=<?php echo $article['id'];?>">voir l'article</a></button>
                    </div>
                </tr><hr>
                    <?php
            }
            paginate($nbrArticle,$perPage);
        }?>  
</table>
