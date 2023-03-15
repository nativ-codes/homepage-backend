<?php
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	$entityBody = json_decode(file_get_contents('php://input'), true);

	$name = $entityBody['name'];
	$email = $entityBody['email'];
	$message = $entityBody['message'];

	function isEmptyString($str) {
		return !(isset($str) && (strlen(trim($str)) > 0));
	}

	if (!isEmptyString($name) && !isEmptyString($email) && !isEmptyString($message)) {
		$toEmail = 'hello@nativ.codes';
		$emailSubject = 'New email from NativCodes contact form';
		$headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
		$bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
		$body = join(PHP_EOL, $bodyParagraphs);

		if (mail($toEmail, $emailSubject, $body, $headers)) {
			echo json_encode(array(
				'success' => true,
				'message' => "Message sent! We'll get in touch soon."
			));
		} else {
			echo json_encode(array(
				'success' => false,
				'message' => "Oops, something went wrong. Please try again later."
			));
		}
	} else {
		echo json_encode(array(
			'success' => false,
			'message' => "Oops, did you forget to fill a field?",
		));
	}
?>