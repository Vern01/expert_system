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
                get_answer($data[$i], $pvalue);//Finish
                unset($data[$i]);
            }
        }
        $data = array_merge($data);
        $new = count($data);
    }
    print_r($data);
    print_r($pvalue);
    return $pvalue;
}

function get_answer($array, &$pvalue)
{
//    echo "before mafs".PHP_EOL;
//    print_r($array);
//    echo "end".PHP_EOL;
    if (count($array) == 4)
        return ;
    if (in_array("+", $array))
        and_solve($array, $pvalue);
    if (in_array("|", $array))
        or_solve($array, $pvalue);
    if (in_array("^", $array))
        eor_solve($array, $pvalue);
//    echo "after mafs".PHP_EOL;
//    print_r($array);
//    echo "end mafs".PHP_EOL;
/*    if (in_array(")",  $array))
        bracket_solve($array);
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
    }*/
}

function check_neg($array)
{
    foreach ($array as $key => $value) {
        if (strpos($value, "!") !== false)
            return (true);
    }
    return (false);
}

function convert2value(&$data, $pvalue)
{
    for ($i=0; $i < count($data); $i++) {
        if ($data[$i] == "=>" || $data[$i] == "<=>")
            break ;
        if (ctype_alpha($data[$i])) {
            if (ctype_alpha($pvalue[$data[$i]]))
                $data[$i] = $pvalue[$pvalue[$data[$i]]];
            else
                $data[$i] = $pvalue[$data[$i]];
        }
        elseif (substr($data[$i], 0, 1) === "!") {
            $data[$i] = intval($pvalue[substr($data[$i], 1, 1)]) * -1;
        }
    }
    return ($data);
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
            if (ctype_alpha($array[$i]) && $pvalue[$array[$i]] === 0)
                return (false);
        }
    return (true);
}
?>