<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

class CheckDBConnection extends Command
{
    protected $signature = 'db:check';
    protected $description = 'Check the database connection';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            DB::connection()->getPdo();
            $this->info("Database connection is successful.");
        } catch (\Exception $e) {
            $this->error("Database connection failed: " . $e->getMessage());
        }
    }
}
