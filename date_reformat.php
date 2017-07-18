<?php
	
	function date_reformat($date)
	{
		$new_date = explode("-", $date);

		return $new_date[2] . '-' . $new_date[1] . '-' . $new_date[0];
	}


?>