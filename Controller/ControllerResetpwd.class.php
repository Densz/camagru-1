<?php

class ControllerResetpwd extends Controller
{
	
	public function view()
	{

	}

	public function sendEmail()
	{
		if (CB::my_assert($_POST['email']))
		{
			$condition = array(
									'email' => "'" . $_POST['email'] . "'" 
								);
			$req = self::$sel->query_select('*', 'users', $condition, true);
			if (CB::my_assert($req))
			{
				$emailTo = htmlspecialchars($_POST['email']);
				$emailFrom = 'tamere@camagru.com';
				$subject = "Camagru - Reset your password";
				$message = "
Hi " . ucfirst($req['login']) . "

To reset your password, click on the link below:

" . Routeur::redirect('Changepwd/view') . "/" . $req['password'] . "

Kind regards,
Team Camagru
";
				$headers = "From: " . $emailFrom . "\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($emailTo, $subject, $message);
				$this->add_buff('email_sent', '<div class="alert alert-success">An email has been sent</div>');
			}
			else
			{
				$this->add_buff('invalid_email', '<div class="alert alert-danger">Email address does not exist</div>');
			}
		}
	}
}