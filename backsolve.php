<?php
function backward_solve($array, &$pvalue)
{
    echo "backsolve start".PHP_EOL;
    $data = front_solve($array, $pvalue);
    foreach($array as $yes)
    {
    //    if (ctype_alpha($yes))

    }
    print_r($data);
    echo "backsolve end".PHP_EOL;
}
 ?>