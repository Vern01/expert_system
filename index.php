#!/usr/bin/php
<?php
require_once('split_data.php');
require_once('data_pieces.php');
require_once('set_data.php');
if (count($argv) == 1)
    return ;
$data = get_data($argv[1]);
//print_r($data);
$pvalue = data_piece($data);
$pvalue = set_data($data, $pvalue);
$extend = extend_data($data, $pvalue);
?>