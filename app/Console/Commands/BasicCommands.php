<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class BasicCommands extends Command
{
    protected $signature = 'basic_commands:run';
    protected $description = 'Basic commands';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Basic commands completed');
    }
}
