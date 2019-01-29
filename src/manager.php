<?php
//--------------------------------------------------------------------------------------------------

function array_sort($array, $on, $order=SORT_ASC):array
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

function error_input():void
{
    echo "<span class='btn btn-outline-danger'>Something went wrong</span>";
}
function paginate( int $iNbrArticle,int $iPerPage):void
{
    $nbPage     = ceil($iNbrArticle/$iPerPage);
    for($i=1;$i<=$nbPage;$i++){?>
        <a class="btn btn-outline-info" href="index.php?p=<?=$i?>">
            &nbsp;&nbsp;
            <?=$i?>
            &nbsp;&nbsp;
        </a><?php
    }
}