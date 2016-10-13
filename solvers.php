<?php
require_once("do_math.php");
function bracket_solve(&$array, $index)
{

}

function and_solve(&$array, &$pvalue)
{
    while (($index = array_search("+", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_and($array[$index - 1], $array[$index + 1]));
    }
    handle_pvalue($array, $pvalue);
}

function or_solve(&$array, &$pvalue)
{
    while (($index = array_search("|", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_and($array[$index - 1], $array[$index + 1]));
    }
    handle_pvalue($array, $pvalue);
}

function eor_solve(&$array, &$pvalue)
{
    while (($index = array_search("^", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_and($array[$index - 1], $array[$index + 1]));
    }
    handle_pvalue($array, $pvalue);
}

function handle_pvalue(&$array, &$pvalue)
{
    if ($array[1] == "=>")
    {
        if ($array[0] != 0 && $pvalue[$array[2]] != 0 && $array[0] != $pvalue[$array[2]])
        {
            echo "There is a contrediction for (" . $array[0] . ", " . $pvalue[$array[2]] .PHP_EOL;
            return ;
        }
        $pvalue[$array[2]] = $array[0];
    }
}
?>