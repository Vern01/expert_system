<?php
function and_bracket(&$array)
{
    while (($index = array_search("+", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_and($array[$index - 1], $array[$index + 1]));
    }
}

function or_bracket(&$array)
{
    while (($index = array_search("|", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_or($array[$index - 1], $array[$index + 1]));
    }
}

function eor_bracket(&$array)
{
    while (($index = array_search("^", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_eor($array[$index - 1], $array[$index + 1]));
    }
}
?>