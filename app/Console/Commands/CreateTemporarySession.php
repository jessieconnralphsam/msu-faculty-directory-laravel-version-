<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;

class CreateTemporarySession extends Command
{
    protected $signature = 'session:create {email}';
    protected $description = 'Create a temporary session with an email as the value';

    public function handle()
    {
        $email = $this->argument('email');

        Session::put('temporary_email', $email);

        $this->info("Temporary session created with email: $email");
    }
}
