<?php
include "conect.php"; 
function login(string $sPseudo, string $sPassword, $pdo):array
{
    $status         =[];
    $pseudo         = testData($sPseudo);
    
    $password       = testData($sPassword);
    $query          = 'SELECT password FROM user WHERE username=:pseudo OR username=:pseudowithat';
    $statement      = $pdo->prepare($query);
    $statement->execute([':pseudo' => "$pseudo",':pseudowithat' => $pseudo.'@gmail.com']);
    $status         = $statement->fetch(PDO::FETCH_ASSOC);

    return !$status ? [] : $status;
}
//----------------------------------------------------------------------------------
function subscribe(string $pseudo, string $password, $pdo):bool
{
    $passwordCrypt  = password_hash($password,PASSWORD_BCRYPT) ;
    $query          = 'INSERT INTO user (`username`, `password`) VALUES (:pseudo, :pass)';
    $statement      = $pdo->prepare($query);
    $status         = $statement->execute([':pseudo' => $pseudo, ':pass' => $passwordCrypt]);

    return !$status ? false : $status;
}
//----------------------------------------------------------------------------------
function getImage(int $article, $pdo ):string
{
    $array             = [];
    $query             = 'SELECT article.image FROM article  WHERE article.id=:id';
    $statement         = $pdo->prepare($query);
    $statement->execute([':id' => (int)$article]);
    $data = $statement->fetch(PDO::FETCH_ASSOC);

    return $data['image'] === NULL  ? 'NULL' : $data['image'];
}
//----------------------------------------------------------------------------------
function ModifyArticle(string $sTitle, string $sContent, int $iArticle, $pdo):bool
{
    $title          = strip_tags($sTitle);
    $content        = strip_tags($sContent);
    $id             = strip_tags($iArticle);
    $author         = getUserId($_SESSION["connexion"],$pdo);

    //----------------------------Save image------
    $image          = getImage($id,$pdo);
    //----------------------------Delete------
    deleteArticle($id,$pdo);
    //-----------------------------Insert-------
    $query          = 'INSERT INTO article (`title`, `content`,`author`,`image`) VALUES (:title, :content, :author, :image)';
    $statement      = $pdo->prepare($query);
    $status         = $statement->execute([':title' => $title, ':content' => $content, ':author' => $author, ':image' => $image]);

    return !$status ? false : $status;
}
//-----------------------------------------------------------------------------------
function deleteArticle(int $iArticle, $pdo, bool $m= null):bool
{
    if($m == true){
        $status     = false;
        //Check if article is from author
        $Authent    = getArticleByUser($iArticle, $pdo);
    }
    $id             = strip_tags($iArticle);
    $query          = 'DELETE FROM article WHERE id=:id';
    $statement      = $pdo->prepare($query);
    $status         = $statement->execute([':id' => $id]);
    
    return !$status ? false : $status;
}
//-----------------------------------------------------------------------------------
function getNbrArtcile($pdo):int
{   
    $query           = 'SELECT COUNT(article.id) as nbr FROM article ';
    $statement       = $pdo->prepare($query);
    $statement->execute();
    $data           = $statement->fetch(PDO::FETCH_ASSOC);

    return $data['nbr'] ? (int)$data['nbr'] : 0;
}
//-----------------------------------------------------------------------------------
function getUserId(string $sPseudo, $pdo):int
{   
    $query            = 'SELECT user.id FROM user WHERE username =:pseudo OR username=:pseudowithat';
    $statement        = $pdo->prepare($query);
    $statement->execute([':pseudo' => "$sPseudo",':pseudowithat' => $sPseudo.'@gmail.com']);
    $data            = $statement->fetch(PDO::FETCH_ASSOC);

    return !$data['id'] ? false: $data['id'];
}
//-----------------------------------------------------------------------------------
function getArticle(int $id, $pdo):array
{
    $array             =[];
    $query             = 'SELECT article.id, article.title, article.content, article.author,article.image FROM article LEFT JOIN user ON article.author=user.id WHERE article.id=:id';
    $statement         = $pdo->prepare($query);
    $statement->execute([':id' => (int)$id]);
    while( $data = $statement->fetch(PDO::FETCH_ASSOC) ) {
        $array[]       = $data;
    }

    return !$array ? [] : $array;
}
//--------------------------------------------------------------------------------------------------
function getArticleByUser($id, $pdo):array
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
function getArticles($pdo, int $cPage):array
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
function getComs(int $article, $pdo):array
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
function addCom(string $sUsername, string $sComent, int $iArticle, $pdo):bool
{
    $username           = testData($sUsername);
    $coment             = strip_tags($sComent);
    $article            = (int)testData($iArticle);
    $query              = 'INSERT INTO commentaire (`username`, `content`,`article`) VALUES (:username, :coment, :article)';
    $statement          = $pdo->prepare($query);
    $status             = $statement->execute([':username' => $username, ':coment' => $coment, ':article' => $article]);

    return !$status ? false : $status;
}
function deleteCom($iCom, $pdo):bool
{
    $article            = (int)strip_tags($iCom);
    
    $query              = 'DELETE FROM commentaire WHERE commentaire.id=:id';
    $statement          = $pdo->prepare($query);
    $status             = $statement->execute([':id' => $article]);

    return !$status ? false : $status;
}



