<?php
function set_data($array, $varray)
{
    for ($i = count($array); $i >= 0; --$i)
    {
        if (substr($array[$i][0], 0, 1) === '=')
        {
            for ($j = 1; $j < strlen($array[$i][0]); $j++)
            {
                $varray[substr($array[$i][0], $j, 1)] = 1;
            }
            return $varray;
        }
    }
}

function extend_data($array, $varray)
{
    for ($i = 0; $array[$i]; $i++)
    {
        if (line_clear($array[$i], $varray))
        {
            $varray = test_case($array[$i], $varray);
        }
    }
}

function test_case()
{

}

function line_clear($array, $varray)
{
    $true = find_true($varray);
    for ($j = 0; $array[$j] !== "=>" ; $j++)
    {
        if (ctype_alpha($array[$j]) && array_key_exists($array[$j], $true) === false)
        {
            return false;
        }
    }
    return true;
}

function find_true($varray)
{
    $true = array();
    foreach ($varray as $key => $value)
    {
        if ($value === 1)
            $true[$key] = 1;
    }
    return $true;
}
?>