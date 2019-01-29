<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-3">
            <?php
            if(isset($_GET['action'])){
            switch ($_GET['action']) {
                case in_array($_GET['action'],['subscribe','login','logout']):
                    include "UserController.php";
                    break;
                case in_array($_GET['action'],['mylist','list','more','newarticle']):
                    include "ArticleController.php";
                    break;
                default:
                exit;
                    include "ArticleController.php";
                    break;
            }
        }else{
            include "ArticleController.php";
        }
            ?>
        </div>
    </div>
</div>