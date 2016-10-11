<?php
function simple_solve(&$data, &$pvalue)
{
    $size = count($data) - 1;
    $new = count($data) - 2;
    print_r($data);
    while ($size > $new)
    {
        $size = $new;
        echo $size.PHP_EOL;
        for ($i=0; $i < ($size - 2); $i++)
        {
            echo $i.PHP_EOL;
            if (all_accounted($data[$i], $pvalue))
            {
                get_answer($data[$i], $pvalue);//Finish
          //      print("delete ".PHP_EOL);
            //    print_r($data[$i]);
                array_splice($data, $i, 1);
              //  print("done");
            }
        }
        $new = count($data);
    }
    print_r($data);
    return $pvalue;
}

function remove_row(&$data, $index)
{
    array_splice($data, $index, 1);
}

function get_answer($data, &$pvalue)
{
    //echo "this stuff";
    //print_r ($data); 
    //echo "end of this stuff".PHP_EOL;
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