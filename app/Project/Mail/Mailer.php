<?php

namespace Project\Mail;

class Mailer
{
	protected $mailer;
// Initializing
	public function __construct($mailer)
	{
		$this->mailer=$mailer;
	}
	
	public function send($template,$data,$callback)
	{	
	
		$message=new Message($this->mailer);
		
		extract($data);
		ob_start();
		require $template;
		$template=ob_get_clean();
		
		
		$message->body($template);
		
		call_user_func($callback,$message);
		$this->mailer->send();
// Mail status	
	if (!$this->mailer->send()) 
		{
		echo "Mailer Error: " . $this->mailer->ErrorInfo;
		}	 
	else 
		{
		echo "Message sent!";
		}
	}
}








?>