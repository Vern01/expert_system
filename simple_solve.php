<?php
require_once("solvers.php");
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
                convert2value($data[$i], $pvalue);
                if (get_answer($data[$i], $pvalue))//Finish
                    unset($data[$i]);
            }
        }
        $data = array_merge($data);
        $new = count($data);
    }
    return $pvalue;
}

function get_answer($array, &$pvalue)
{
    if (check_prams($array) < 3)
    {
        front_solve($array, $pvalue);
        return true;
    }
    else
    {
        $a = check_if_fucker_solvable($array);
        backward_solve($array, $pvalue);
        if ($a == 1)
            return false;
        return true;
    }
}

function check_if_fucker_solvable($array)
{
    $a = 0;
    foreach($array as $yes)
    {
        if (ctype_alpha($yes))
            $a++;
        if ($a > 1)
            return 1;
    }
    return 0;
}

function front_solve($array, &$pvalue)
{
    if (in_array("+", $array))
        and_solve($array, $pvalue);
    if (in_array("|", $array))
        or_solve($array, $pvalue);
    if (in_array("^", $array))
        eor_solve($array, $pvalue);
    return ($array);
}

function check_prams($array)
{
    $i = count($array) -2;
    $b = 0;
    while ($i > 0)
    {
        if ($array[$i] == "=>" || $array[$i] == "<=>")
            return $b;
        $i--;
        $b++;
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

function convert2value(&$array, $pvalue)
{
    for ($i=0; $i < count($array); $i++) {
        if (ctype_alpha($array[$i]) && $pvalue[$array[$i]] != 0) {
            if (ctype_alpha($pvalue[$array[$i]]))
            {
                $array[$i] = $pvalue[$pvalue[$array[$i]]];
                while (ctype_alpha($array[$i]))
                    $array[$i] = $pvalue[$pvalue[$array[$i]]];
            }
            else
                $array[$i] = $pvalue[$array[$i]];
        }
        elseif (substr($array[$i], 0, 1) === "!") {
            $array[$i] = intval($pvalue[substr($array[$i], 1, 1)]) * -1;
        }
    }
    print_r($array);
    return ($array);
}

function all_accounted($array, &$pvalue)
{
    $size = count($array);
    if ($size == 4 && ctype_alpha($array[0]) && ctype_alpha($array[2]))
        $pvalue[$array[2]] = $array[0];
    elseif ($size != 4)
        for ($i=0; $i < $size; $i++)
        {
            if ($array[$i] == "=>" || $array[$i] == "<=>")
                break ;
            if (ctype_alpha($array[$i]) && $pvalue[$array[$i]] !== 1)
                return (false);
        }
    return (true);
}
?>