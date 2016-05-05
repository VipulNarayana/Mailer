<?php

namespace Project\Mail;

class Message
{
// Initializing.
	public function __construct($mailer)
	{
	$this->mailer=$mailer;
	}
// Function to store address of recipient.	
	public function to($address)
	{
	$this->mailer->addAddress($address);
	
	}
// Function to store subject.
	public function subject($subject)
	{
	$this->mailer->Subject= $subject;
	}
// Function to store body.	
	public function body($body)
	{
	$this->mailer->Body= $body;
	}
	
}