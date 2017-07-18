<?php
	
	function userAge($date_test)
	{
		$defdate = date('Y-m-d');

		$date_def_sep = explode("-", $defdate);
		$date_test_sep = explode("-", $date_test);

		if ($date_def_sep[0] > $date_test_sep[0]) {
			if ($date_def_sep[1] < $date_test_sep[1])
				$age = abs($date_test_sep[0] - $date_def_sep[0] + 1);
			else if ($date_def_sep[1] == $date_test_sep[1])
			{
				if ($date_def_sep[2] < $date_test_sep[2])
					$age = abs($date_test_sep[0] - $date_def_sep[0] + 1);
				else $age = abs($date_test_sep[0] - $date_def_sep[0]);
			}
			else $age = abs($date_test_sep[0] - $date_def_sep[0]);
		}
		else $age = null;

		return $age;
	}


?>