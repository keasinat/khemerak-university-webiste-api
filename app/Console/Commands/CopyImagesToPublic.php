<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CopyImagesToPublic extends Command
{
    protected $signature = 'images:copy';
    protected $description = 'Copy images from resources to public directory';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sourcePath = resource_path('images');
        $destinationPath = public_path('images');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        File::copyDirectory($sourcePath, $destinationPath);

        $this->info('Images copied successfully!');
    }
}
