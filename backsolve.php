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
    while ($i < count($array))
    {
        if ($array[$i] == ctype_digit($array[$i]))
        {
            $prams[$b] = $array[$i];
            $b++;
        }
        $i++;
    }
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
