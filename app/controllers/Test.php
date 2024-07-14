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

		public function demo() {
			require_once 'HTTP/Request2.php';
			$request = new HTTP_Request2();
			$request->setUrl('https://y3y6dd.api.infobip.com/sms/2/text/advanced');
			$request->setMethod(HTTP_Request2::METHOD_POST);
			$request->setConfig(array(
				'follow_redirects' => TRUE
			));
			$request->setHeader(array(
				'Authorization' => 'App ********************************-********-****-****-****-********665a',
				'Content-Type' => 'application/json',
				'Accept' => 'application/json'
			));
			$request->setBody('{"messages":[{"destinations":[{"to":"639063387451"}],"from":"VVDOPTICL","text":"Congratulations on sending your first message.\\nGo ahead and check the delivery report in the next step."}]}');
			try {
				$response = $request->send();
				if ($response->getStatus() == 200) {
					echo $response->getBody();
				}
				else {
					echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
					$response->getReasonPhrase();
				}
			}
			catch(HTTP_Request2_Exception $e) {
				echo 'Error: ' . $e->getMessage();
			}
					}
	}