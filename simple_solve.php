<?php
require_once("solvers.php")
function simple_solve(&$data, &$pvalue)
{
    $size = count($data) + 1;
    $new = count($data);
    while ($size > $new)
    {
        $size = $new;
        for ($i=0; $i < ($size - 2); $i++)
        {
            if (all_accounted($data[$i], $pvalue))
            {
                get_answer($data[$i], $pvalue);//Finish
                unset($data[$i]);
            }
        }
        $data = array_merge($data);
        $new = count($data);
    }
    print_r($data);
    return $pvalue;
}

function get_answer($array, &$pvalue)
{
    if (in_array(")", $array))
        bracket_solve($array);
    if (check_neg($array))
        neg_solve($array);
    if (in_array("+", $array))
        and_solve($array);
    if (in_array("|", $array))
        or_solve($array);
    if (in_array("^", $array))
        eor_solve($array);
    if (in_array("=>", $array))
        implie($array);
    else if (in_array("<=>", $array))
        defente($array);
    else {
        echo "This is an invalid rule." . PHP_EOL;
    }
}

function check_neg($array)
{
    foreach ($array as $key => $value) {
        if (strpos($value, "!") !== false)
            return (true);
    }
    return (false);
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