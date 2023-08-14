<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BackupDatabase extends Command
{
    protected $signature = 'backup:sqlite';
    protected $description = 'Create a backup of the SQLite database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $databasePath = config('database.connections.sqlite.database');
        $backupPath = 'backups/' . now()->format('Y-m-d_H-i-s') . '.sqlite';

        Storage::copy($databasePath, $backupPath);

        $this->info('Database backup created: ' . $backupPath);
    }
}