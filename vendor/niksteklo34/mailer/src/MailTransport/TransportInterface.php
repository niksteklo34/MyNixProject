<?php

namespace Niksteklo34\mailer\MailTransport;

interface TransportInterface
{
    public function send(Message $message): bool;
}