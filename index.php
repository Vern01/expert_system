#!/usr/bin/php
<?php
require_once('split_data.php');
require_once('data_pieces.php');
require_once('set_data.php');
require_once('simple_solve.php');
require_once('do_math.php');
require_once('backsolve.php');
if (count($argv) == 1)
    return ;
$data = get_data($argv[1]);
$pvalue = data_piece($data);
$pvalue = set_data($data, $pvalue);
$extend = extend_data($data, $pvalue);
$pvalue = simple_solve($data, $pvalue);
print_r($data);
print_r($pvalue);
?>