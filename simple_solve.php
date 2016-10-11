<?php
function simple_solve(&$data, &$pvalue)
{
    $size = count($data);
    $new = $size;
    while ($size > $new)
    {
        $size = $new;
        for ($i=0; $i < $size; $i++)
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
        //Ross code..
}

function all_accounted($array, $defarray)
{
    for ($i=0; $i < count($array); $i += 2)
    {
        if ($pvalue[$array[$i]] == 0)
            return (false);
    }
    return (true);
}
?>