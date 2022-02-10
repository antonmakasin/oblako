<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    protected $signature = 'create_database:run';
    protected $description = 'Create database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $databaseFile = config('database.connections.sqlite.database');

        if (!file_exists($databaseFile))
        {
            file_put_contents($databaseFile, '');
        }

        $this->info('Successfully created');
    }
}
