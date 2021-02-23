<?php

namespace Niksteklo34\mailer\Render;

class Render
{
    const TEMPLATE_VAR_PATTERN = '~{{ [a-zA-Z]+ }}~';
    public function build_email_template(string $template_name, string $message): ?string
    {
        $email_template_string = file_get_contents(__DIR__ . '/../templates/' . "$template_name" .".html", true);
        return preg_replace(self::TEMPLATE_VAR_PATTERN, $message, $email_template_string);
    }
}