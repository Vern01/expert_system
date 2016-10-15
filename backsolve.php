<?php
function backward_solve($array, &$pvalue)
{
    $data = front_solve($array, $pvalue);
    print_r($data);
    if (in_array("+", $array))
    {
        if ($data[0] == 1)
        {
            if($data[2] == 1)
            {
                    $pvalue[$data[4]] = 1;
            }
        }
    }
    if (in_array("|", $array))
    {
        if ($data[0] == 1)
        {
            if($data[2] == 1)
            {
                    $pvalue[$data[4]] = 0;
            }
        }
    }
    if (in_array("^", $array))
    {
        if ($data[0] == 1)
        {
            if($data[2] == 1)
            {
                    $pvalue[$data[4]] = -1;
            }
        }
    }
}
 ?>