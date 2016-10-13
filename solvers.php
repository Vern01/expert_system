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
}

function or_solve(&$array, &$pvalue)
{
    while (($index = array_search("|", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_and($array[$index - 1], $array[$index + 1]));
    }
}

function eor_solve(&$array, &$pvalue)
{
    while (($index = array_search("^", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_and($array[$index - 1], $array[$index + 1]));
    }
}

function handle_pvalue(&$array, &$pvalue)
{
    if (array_search("=>", $array))
    {

    }
}
?>