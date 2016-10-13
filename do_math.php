<?php
function do_or($a, $b)
{
	if ($a == 0 || $b == 0)
		return 0;
	elseif ($a == 1 || $b == 1)
		return 1;
	else
		return -1;
}

function do_and($a, $b)
{
	if ($a == 0 || $b == 0)
		return (0);
	elseif ($a == 1 && $b == 1)
		return (1);
	else
		return (-1);
}

function do_eor($a, $b)
{
	if ($a == 0 || $b == 0)
		return 0;
	elseif ($a == do_not($b))
		return 1;
	else
		return -1;
}

function do_not($a)
{
	if ($a == 0)
		return 0;
	else
		return -$a;
}
?>