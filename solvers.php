<?php
require_once("do_math.php");

function bracket_solve(&$array)
{
    while($index = array_search("(", $array) !== false)
    {
        if (($index2 = array_search("(", $array + $index)) < ($index3 = array_search(")", $array + $index)))
        {
        //    array_splice($array, $index + $index2, $index3 - $index2, bracket_solve($array + $index)
        }
    }
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
        array_splice($array, $index - 1, 3, do_or($array[$index - 1], $array[$index + 1]));
    }
    print_r($array);
    handle_pvalue($array, $pvalue);
}

function eor_solve(&$array, &$pvalue)
{
    while (($index = array_search("^", $array)) !== false && $index < array_search("=>", $array))
    {
        array_splice($array, $index - 1, 3, do_eor($array[$index - 1], $array[$index + 1]));
    }
    handle_pvalue($array, $pvalue);
}

function handle_pvalue(&$array, &$pvalue)
{
    if ($array[1] == "=>")
    {
        if ($array[0] != 0 && $pvalue[$array[2]] != -1 && $array[0] != $pvalue[$array[2]])
        {
            if (ctype_alpha($pvalue[$array[2]]))
                echo $array[2] . " has been set to another value";
            else
                echo "There is a contrediction for (" . $array[0] . ", " . $pvalue[$array[2]] . ")" . PHP_EOL;
            return ;
        }
        if (substr($array[2], 0, 1) == "!")
        {
            $array[2] = substr($array[2], 1, 1);
            $array[0] = $array[0] * -1;
        }
        $pvalue[$array[2]] = $array[0];
    }
}
?>