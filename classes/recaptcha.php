<?php

class Recaptcha {

	public static function render($error = null, $use_ssl = false)
	{
		return recaptcha_get_html(Kohana::$config->load('recaptcha')->public, $error, $use_ssl);
	}

	public static function validate()
	{
		$resp = recaptcha_check_answer( Kohana::$config->load('recaptcha')->private,
			$_SERVER["REMOTE_ADDR"],
			$_POST["recaptcha_challenge_field"],
			$_POST["recaptcha_response_field"]);

		return $resp->is_valid;
	}
}

require_once Kohana::find_file('vendor', 'recaptchalib');