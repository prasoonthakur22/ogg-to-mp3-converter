<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DeleteOldFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete old files';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $files = File::allFiles(storage_path('app'));
        foreach ($files as $file) {
            $fileCreatedAt = (date("F d Y H:i:s.", filemtime($file)));
            $end = Carbon::parse($fileCreatedAt);
            $current = Carbon::now();
            $length = $end->diffInHours($current);

            if ($length > 1) {
                File::delete($file);
            }
        }

        echo "Deleted All Old Files";
    }
}
