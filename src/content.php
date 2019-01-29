<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-3">
            <?php
            if(isset($_GET['action'])){
            switch ($_GET['action']) {
                case in_array($_GET['action'],['subscribe','login','logout']):
                    include "Controller/UserController.php";
                    break;
                case in_array($_GET['action'],['mylist','list','more','newarticle']):
                    include "Controller/ArticleController.php";
                    break;
                default:
                exit;
                    include "Controller/ArticleController.php";
                    break;
            }
        }else{
            include "Controller/ArticleController.php";
        }
            ?>
        </div>
    </div>
</div>