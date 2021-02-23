<?php

namespace Niksteklo34\mailer\MailTransport;
use Niksteklo34\mailer\MailTransport\TransportInterface;
use Niksteklo34\mailer\MailTransport\Message;

class MailTransport implements TransportInterface
{
    private $transport;
    private $mailer;

    public function __construct(string $host, string $port, string $username, string $password)
    {
        $this->transport = (new \Swift_SmtpTransport($host, $port, 'ssl'))
            ->setUsername($username)
            ->setPassword($password);
        $this->mailer = (new \Swift_Mailer($this->transport));
    }

    public function send(Message $message): bool
    {
        return $this->mailer->send(

                (new \Swift_Message($message->getTitle()))
                ->setFrom(['coffezin@doe.com' => 'Coffezin Administrator'])
                ->setTo($message->getEmail())
                ->setBody($message->getBody(), 'text/html')
        ) !== 0 ;
    }
}