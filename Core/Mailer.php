<?php

namespace Core;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{
    public function sendMail($body, $purchase_id = 0, $name = null, $email = null)
    {
        $subject = "AlexGameShop: Purchase#" . "$purchase_id";

        if (!isset($email)) {
            $email = $_SESSION['email'];
        }

        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('hardalina62@gmail.com')
            ->setPassword('Niksteklo34');

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message("$subject"))
            ->setFrom(['hardalina62@gmail.com' => 'Coffezin_Admin'])
            ->setTo(["$email"])
            ->setBody("$body");

        $result = $mailer->send($message);

        return $result;
    }
}