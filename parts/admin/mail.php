<?php
	function sendForm(){
		parse_str($_POST['data'], $data);

		dd($data);

		$sendTo = get_post_meta(get_page_data('contacts')->ID, 'email_tech', true);

		$newLine = "<br/>";

		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Заявка с сайта Серебряный Век <from@example.com>\r\n";
		$headers .= "Reply-To: '.$sendTo.'\r\n";

		$to      = $sendTo;

		$subject = 'Заявка с сайта Серебряный Век';
		$message = '';


		mail($to, $subject, $message, $headers);
		wp_die();
	}

	add_action('wp_ajax_nopriv_send_form', 'sendForm' );
	add_action('wp_ajax_send_form', 'sendForm' );
?>
