<?php

function subscribe(string $pseudo,string $password,$pdo):bool
{
    $passwordCrypt  = password_hash($password,PASSWORD_BCRYPT) ;
    $query          = 'INSERT INTO user (`username`, `password`) VALUES (:pseudo, :pass)';
    $statement      = $pdo->prepare($query);
    $status         = $statement->execute([':pseudo' => $pseudo, ':pass' => $passwordCrypt]);
    return !$status ? false : $status;
}
function ModifyArticle(string $sTitle,string $sContent,int $iArticle,$pdo):void
{
    $title      = strip_tags($sTitle);
    $content    = strip_tags($sContent);
    $id         = strip_tags($iArticle);
    $author     = getUserId($_SESSION["connexion"],$pdo);
    //----------------------------Delete------
    deleteArticle($id,$pdo);
    //-----------------------------Insert-------
    $query      = 'INSERT INTO article (`title`, `content`,`author`) VALUES (:title, :content, :author)';
    $statement  = $pdo->prepare($query);
    $status     = $statement->execute([':title' => $title, ':content' => $content, ':author' => $author]);
    
}
//-----------------------------------------------------------------------------------
function deleteArticle(int $iArticle,$pdo)
{
    $id         = strip_tags($iArticle);;
    $query      = 'DELETE FROM article WHERE id=:id';
    $statement  = $pdo->prepare($query);
    $status     = $statement->execute([':id' => $id]);
}
//-----------------------------------------------------------------------------------
function getNbrArtcile($pdo):int
{   
    $query              = 'SELECT COUNT(article.id) as nbr FROM article ';
    $statement          = $pdo->prepare($query);
    $statement->execute();
    $aData              = $statement->fetch(PDO::FETCH_ASSOC);

    return $aData['nbr'] ? (int)$aData['nbr'] : 0;
}
//-----------------------------------------------------------------------------------
function getUserId(string $sPseudo,$pdo):int
{   
    $query              = 'SELECT user.id FROM user WHERE username =:pseudo';
    $statement          = $pdo->prepare($query);
    $statement->execute([':pseudo' => "$sPseudo"]);
    $aData              = $statement->fetch(PDO::FETCH_ASSOC);

    return !$aData['id'] ? false: $aData['id'];
}
//-----------------------------------------------------------------------------------
function getArticle(int $id,$pdo):array
{
    $array              =[];
    $query              = 'SELECT article.id, article.title, article.content, article.author,article.image FROM article LEFT JOIN user ON article.author=user.id WHERE article.id=:id';
    $statement          = $pdo->prepare($query);
    $statement->execute([':id' => (int)$id]);
    while( $data = $statement->fetch(PDO::FETCH_ASSOC) ) {
        $array[]        = $data;
    }

    return !$array ? [] : $array;
}
//--------------------------------------------------------------------------------------------------
function getArticleByUser($id,$pdo):array
{
    $array              =[];
    $query              = 'SELECT article.id, article.title, article.content,article.image ,article.author FROM article LEFT JOIN user ON article.author=user.id WHERE user.id=:id';
    $statement          = $pdo->prepare($query);
    $statement->execute([':id' => (int)$id]);
    while( $data = $statement->fetch(PDO::FETCH_ASSOC) ) {
        $array[]    =$data;
    }

    return empty($array) ? [] : $array;
}
//-----------------------------------------------------------------------------------
function getArticles($pdo,int $cPage):array
{
    $array              =[];
    $perPage            = 5;
    $query              = 'SELECT article.id, article.title, article.content, article.author, article.image FROM article ORDER BY article.title DESC LIMIT :fromart,:toart';
    $statement          = $pdo->prepare($query);
    $from               = (($cPage-1)*$perPage);
    $statement->bindParam(':fromart', $from, PDO::PARAM_INT);
    $statement->bindParam(':toart', $perPage, PDO::PARAM_INT);
    $statement->execute();
    if($statement){
        while( $data = $statement->fetch(PDO::FETCH_ASSOC) ){
            $array[]    = $data;
        }
    }
    
    return empty($array) ? [] : $array;
}
//--------------------------------------------------------------------------------------------------
function getComs($article,$pdo):array
{
    $array              =[];
    $query              = 'SELECT commentaire.id,commentaire.username,commentaire.content FROM commentaire WHERE article =:article';
    $statement          = $pdo->prepare($query);
    $statement->execute([':article' => $article]);
    while( $data = $statement->fetch(PDO::FETCH_ASSOC) ){
         
        $array[]=$data;
    }
    
    return empty($array) ? [] : $array;
}
function addCom($sUsername,$sComent,$iArticle,$pdo):bool
{
    $username       = strip_tags($sUsername);
    $coment         = strip_tags($sComent);
    $article        = (int)strip_tags($iArticle);
    
    $query          = 'INSERT INTO commentaire (`username`, `content`,`article`) VALUES (:username, :coment, :article)';
    $statement      = $pdo->prepare($query);
    $status         = $statement->execute([':username' => $username, ':coment' => $coment, ':article' => $article]);

    return !$status ? false : $status;
}
function deleteCom($iCom,$pdo):bool
{
    $article        = (int)strip_tags($iCom);
    
    $query          = 'DELETE FROM commentaire WHERE commentaire.id=:id';
    $statement      = $pdo->prepare($query);
    $status         = $statement->execute([':id' => $article]);

    return !$status ? false : $status;
}




