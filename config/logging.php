<?php

	function logMsg($message) {
		$dataToLog = array(
			date('Y-m-d H:i:s'),
			$_SERVER['REMOTE_ADDR'],
			$message
		);

		$data = implode(" - ", $dataToLog);
		$data .= PHP_EOL;

		file_put_contents('../logs/' . date('Y-m-d') . '.log', $data, FILE_APPEND);
	}

?>