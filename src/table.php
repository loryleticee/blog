        <table class="table table-hover">
            <tr>
                <?php   foreach(array_keys($tab[0]) as $values): ?>
                
                        <th><?php echo ucfirst($values) ?></th>
<?php 
                            if($i >= 5)
                                break;
                                $i++; 
                            endforeach;
?>
                        <th>Détails</th>
            </tr>
            
<?php       $tab = array_sort($tab,$on,SORT_ASC);

            foreach($tab as $value):
                if(mb_substr($value['email'],-3,3) != "com"):
                    continue;
                endif;
?>

                <tr>
                    <td> <?php echo '📍'.$value['id']?></td>
                    <td> <?php echo ucfirst($value['first_name'])?></td>
                    <td> <?php echo ucfirst($value['last_name'])?></td>
                    <td>
                        <?php  echo $value['email'];?>
                    </td>
                    <td> 
                        <?php if($value['gender'] !='Female'){
                                ?> <i class="fas fa-male fa-lg"></i><?php 
                                }else{
                                    ?><i class="fas fa-female fa-lg"></i><?php
                                    }?> 
                    </td>
                    <td> 
                        <?php echo $value['age'] < '18' ? sprintf('Major') : sprintf('minor') ;?>
                    </td>
                    <td> 
                        <a href="/tp/index.php?id=<?= $value['id'] ?>">👀</a>
                    </td>
                </tr>
<?php       endforeach;?>
        </table>