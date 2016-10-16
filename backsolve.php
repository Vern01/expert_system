<?php
function backward_solve($array, &$pvalue)
{
    $data = front_solve($array, $pvalue);
    $pos = findpos($data);
    $prams = find_prams($data);
    if (in_array("+", $array))
    {
        if ($prams[0] == 1)
        {
            if($prams[2] == 1)
            {
                    $pvalue[$data[$pos]] = 1;
            }
        }
    }
    if (in_array("|", $array))
    {
        echo "or".PHP_EOL;
        print_r($prams);
        print_r($data);
        if ($prams[0] == 1)
        {
            if($prams[1] == 1)
            {
                    $pvalue[$data[$pos]] = 0;
            }
        }
    }
    if (in_array("^", $array))
    {
        if ($prams[0] == 1)
        {
            if($prams[1] == 1)
            {
                    $pvalue[$data[$pos]] = -1;
            }
        }
    }
}

function find_prams($array)
{
    $prams = array();
    $i = 0;
    $b = 0;
    echo "hello pram";
    foreach($array as $yes)
    {
        echo " : ".$i.PHP_EOL;
        if (is_int($yes))
        {
            $prams[$b] = $yes;
            $b++;
        }
    }
    print_r($prams);
    return $prams;
}

function findpos($array)
{   
    $i = 0;
    while($i < count($array))
    {
        if (ctype_alpha($array[$i]))
            return $i;
        $i++;
    }
    return 0;
}
 ?>
