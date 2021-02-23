# My Swift Mailer

Use email for your site. Based on swiftmailer/swiftmailer.

##Install with Composer
`composer require niksteklo34/mailer`

##Initialization
Parameters:

For SMTP Server: smtp.gmail.com

– _SMTP user: vashemail@gmail.com_

– _SMTP password: password from your Gmail account_

– _SMTP port: 465_

– _TLS/SSL: needed._

### Here is an example of Swiftmailer call

``` php
<?php

require 'vendor/autoload.php';
use Niksteklo34\mailer\MailTransport\MailTransport;
use Niksteklo34\mailer\MailTransport\Message;
use Niksteklo34\mailer\Render\Render;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$mailTransport = new MailTransport(
    getenv('HOST'),
    (int) getenv('PORT'),
    getenv('USER_EMAIL'),
    getenv('USER_PASSWORD'),
    'ssl'
);
$templateName = 'auth';
$message = 'You have been successufuly authorization';
$templateMessage = (new Render())->build_email_template($templateName, $message);

$mailTransport->send( new Message('Welcome', $templateMessage, getenv('EMAIL_TO')));

```

