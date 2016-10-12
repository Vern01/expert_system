<?php
function set_data($array, $varray)
{
    for ($i = count($array) - 1; $i >= 0; $i--)
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
    $newdata = array();
    foreach ($varray as $key => $yes)
    {
        if ($yes == 1)
        {
            $newdata[$key] = $yes;
        }
    }
    return ($newdata);
}
?>