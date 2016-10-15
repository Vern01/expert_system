<?php
function data_piece($data)
{
    $array = array();
    for ($i = 0; $i < count($data); $i++)
    {
        for ($j = 0; $j < count($data[$i]); $j++)
        {
            if (strlen($data[$i][$j]) == 1 && ctype_upper($data[$i][$j]))
                $array = add_uni($array, $data[$i][$j]);
        }
    }
    return $array;
}

function add_uni($array, $str)
{
    $array[$str] = -1;
    ksort($array);
    return $array;
}
?>