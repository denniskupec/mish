<?php

// progress indicator 
$progress = function() use (&$progress)
{
	$clist = ['⠋', '⠙', '⠹', '⠸', '⠼', '⠴', '⠦', '⠧', '⠇', '⠏']; // https://github.com/briandowns/spinner#available-character-sets

	$progress = function() use (&$progress, &$clist)
	{
		$clist[] = array_shift($clist);
		echo "\r\033[1;36m" . $clist[0];
	};
};


// generate an unused string
$random_string = function() use (&$random_string)
{
	$used = [];

	$random_string = function() use (&$random_string, &$used)
	{
		$new_name = substr(str_shuffle("abcdefghijklmnopqrstuvwxy"), 0, mt_rand(5, 21));

		if(!in_array($new_name, $used)) {
			$used[] = $new_name;
			return $new_name;
		}

		return $random_string();
	};
};
