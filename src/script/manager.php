<?php
function beFirstCom()
{
    echo  <<<'EOD'
    <div class="alert alert-dismissible alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Be the first!</strong> There are not yet <a href="#username" class="alert-link">coment</a>, but it\'s not super important.
    </div>
EOD;
}
//--------------------------------------------------------------------------------------------------
function testDatas(...$data):array
{
    foreach($data as $var){
        $var           = strip_tags($var);
        $var           = stripslashes($var);
        $var           = trim($var);
        $array[]       = $var;
    }
    
    return $array;
}
//--------------------------------------------------------------------------------------------------
function testData($data)
{
    $data           = strip_tags($data);
    $data           = stripslashes($data);
    $data           = trim($data);
    return $data;
}

function showPseudo():string
{
    return mb_strstr($_SESSION["connexion"],'@',true);
}

//--------------------------------------------------------------------------------------------------

function array_sort(array $array, int $on, $order=SORT_DESC):array
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
//--------------------------------------------------------------------------------------------------

function great_input():void
{
    echo '<span class="badge badge-success">Done successfully</span>';
}
function error_input():void
{
    echo "<span class='btn btn-outline-danger'>Something went wrong</span>";
}
function paginate( int $iNbrArticle, int $iPerPage):void
{
    $nbPage     = ceil($iNbrArticle/$iPerPage);
    for($i=1;$i<=$nbPage;$i++){?>
        <a class="btn btn-outline-warning" href="index.php?p=<?=$i?>">
            &nbsp;&nbsp;
            <?=$i?>
            &nbsp;&nbsp;
        </a><?php
    }
}