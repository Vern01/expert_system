<?php
function get_data($filename)
{
    if (!($fd = fopen($filename, 'r')))
        return false;
    $data = array();
    while (($line = fgets($fd)) !== false)
    {
        if (substr($line, 0, 1) !== '#')
        {
            $line = preg_replace("/\s\s+/", ' ', $line);
            $line = substr($line, 0, strpos($line, '#'));
            $data[] = split(' ', $line);
        }
    }
    return $data;
}
?>