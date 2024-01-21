<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PhpDocGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpdoc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all phpdoc (from command generate, model, meta) with ide_helper';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        system('php artisan ide-helper:generate');
        system('php artisan ide-helper:model');
        system('php artisan ide-helper:meta');
        return 0;
    }
}
