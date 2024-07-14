<?php 

	
	class Test extends Controller
	{

		public function index()
		{
			$_href = URL.DS._route('user:verification' , seal(1));
			$_anchor = "<a href='{$_href}'>clicking this link</a>";

			$email_content = <<<EOF
				a simple message with reference #0912311, Colors
			EOF;

			$email_body = wEmailComplete($email_content);

			$mobileNumber = str_to_mobile('09063387451');
			$response = send_sms($email_content, [$mobileNumber]);

			dd($response);
			

			// _mail('chromaticsoftwares@gmail.com' , "Verify Account" , $email_body);
		}
	}