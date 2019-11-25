<?php

namespace App\Support\MailConfiguration\Drivers;

use Illuminate\Contracts\Config\Repository;

class Smtp extends Driver
{
    public function name(): string
    {
        return 'smtp';
    }

    public function validationRules(): array
    {
        return [
            'smtp_host' => 'required',
            'smtp_port' => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
        ];
    }

    public function registerConfigValues(Repository $config, array $values)
    {
        $config->set('mail.driver', $this->name());
        $config->set('mail.host', $values['smtp_host']);
        $config->set('mail.port', $values['smtp_port']);
        $config->set('mail.username', $values['smtp_username']);
        $config->set('mail.password', $values['smtp_password']);
    }
}
