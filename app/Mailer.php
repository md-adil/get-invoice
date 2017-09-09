<?php
namespace App;
/**
* 
*/
use Swift_SmtpTransport;
use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;

class Mailer
{
	protected static $instance;
	protected $transport;
	protected $mailer;
	protected $message;

	function __construct($configs)
	{
		$configs = array_merge([
			'username' => 'AKIAI6QPGCNCAAI6CA4Q',
			'password' => 'AnH2Y0jYNa2g0AV8RjvOgaHvCQWo+UmS00J4lryEByjX'
		], $configs);

		$this->transport = (new Swift_SmtpTransport('email-smtp.us-east-1.amazonaws.com', 465, 'ssl'))
		  ->setUsername($configs['username'])
		  ->setPassword($configs['password'])
		  ;

		$this->mailer = new Swift_Mailer($this->transport);
		$this->message = new Swift_Message();
		$this->message->setFrom(['info@biglytech.net' => 'Bigly Tech']);

	}

	public function send($to, $from = []) {
		$this->message->setTo($to);
		$result = $this->mailer->send($this->message);
	}

	public function attachFile($filename, $name) {
		$this->message->attach(Swift_Attachment::fromPath($filename)->setFilename($name));
	}

	public function subject($subject) {
		$this->message->setSubject($subject);
		return $this;
	}

	public function html($html, $subject = null) {
		if($subject) {
			$this->message->setSubject($subject);
		}
		$this->message->setBody($html);
	  	return $this;
	}

	public function text() {

	}

	public function attach($data, $name, $mime = 'application/pdf') {
		$attachment = new Swift_Attachment($data, $name, $mime);
		$this->message->attach($attachment);
		return $this;
	}
	
	public static function instance($configs = []) {
		return new static($configs);
	}
}


