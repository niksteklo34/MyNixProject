<?php

namespace Niksteklo34\mailer\MailTransport;

class Message
{
    private $email;
    private $title;
    private $body;

    public function __construct($title, $body, $email)
    {
        $this->title = $title;
        $this->body = $body;
        $this->email = $email;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getEmail()
    {
        return $this->email;
    }
}