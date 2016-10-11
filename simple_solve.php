<?php
function simple_solve(&$data, &$pvalue)
{
    $size = count($data) + 1;
    $new = count($data);
    while ($size > $new)
    {
        $size = $new;
        for ($i=0; $i < $size - 2; $i++)
        {
            if (all_accounted($data[$i], $pvalue))
            {
                get_answer($data[$i], $pvalue);//Finish
                remove_row($data, $i);
            }
        }
        $new = count($data);
    }
}

function remove_row(&$data, $index)
{
    array_splice($data, $index, 1);
}

function get_answer($data, &$pvalue)
{
    $temp = convert2value($data, $pvalue);
    while (count($temp) != 3)
    {

    }
}

function convert2value($data, $pvalue)
{
    $temp = $data;
    for ($i=0; $i < count($data); $i++) {
        if ($data[$i] == "=>" || $data[$i] == "<=>")
            break ;
        if (ctype_alpha($data[$i])) {
            $temp[$i] = $pvalue[$data[$i]];
        }
    }
    return ($temp);
}

function all_accounted($array, $pvalue)
{
    for ($i=0; $i < count($array); $i++)
    {
        if ($array[$i] == "=>" || $array[$i] == "<=>")
            break ;
        if (ctype_alpha($array[$i]) && $pvalue[$array[$i]] == 0)
            return (false);
    }
    return (true);
}
?>