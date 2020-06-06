<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Console\Command;

class CacheData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache API reponses';

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
        $this->line('');
        $this->info('Getting User Data...');
        $this->line('');

        User::cache();

        $this->line('');
        $this->info('Done!');
        $this->line('');

        $this->line('');
        $this->info('Getting Post Data...');
        $this->line('');

        Post::cache();

        $this->line('');
        $this->info('Done!');
        $this->line('');

        $this->line('');
        $this->info('Getting Comment Data...');
        $this->line('');

        Comment::cache();

        $this->line('');
        $this->info('Done!');
        $this->line('');

    }
}
