<?php

namespace App\Console\Commands;

use App\Models\RecursiveFileFinder;

use Illuminate\Console\Command;

class DeleteFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:files {directory : The directory to be searched}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recursively delete files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $directoryPath = trim($this->argument('directory'));

        // create RecursiveFileFinder object
        $recursiveFileFinder = new RecursiveFileFinder($directoryPath);

        $this->line('');
        $this->info('Searching for files...');
        $this->line('');

        $recursiveFileFinder->find();
        $filePaths = $recursiveFileFinder->getResults();

        $bar = $this->output->createProgressBar(count($filePaths));
        $bar->start();

        $rows = [];

        foreach ($filePaths as $filePath) {

            $rows[] = [$filePath];

            unlink($filePath);

            $bar->advance();
        }        

        $bar->finish();

        $this->line('');
        $this->line('');

        $headers = ['Files Removed'];

        $this->table($headers, $rows);

        $this->line('');
        $this->info('Done!');
        $this->line('');

    }
}
