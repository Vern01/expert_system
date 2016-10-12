<?php
function get_data($filename)
{
    if (!($fd = fopen($filename, 'r')))
        return false;
    $data = array();
    while (($line = fgets($fd)) !== false)
    {
        if (substr($line, 0, 1) !== '#' && strlen(trim(substr($line,0 , strrpos($line, '#')))) !== 0)
        {
            $line = preg_replace("/\s\s+/", ' ', trim($line));
            $line = substr($line, 0, strpos($line, '#'));
            $data[] = explode(' ', $line);
        }
    }
    return $data;
}
?>