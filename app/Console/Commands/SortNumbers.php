<?php

namespace App\Console\Commands;

use App\Models\Sorter;

use Faker\Factory as Faker;

use Illuminate\Console\Command;

class SortNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sort:numbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sort numbers';

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
        $faker = Faker::create();

        $numbers = [];

        $headers = ['Unsorted'];
        $rows = [];

        // generate random numbers and populate unsorted table row data
        for ($i = 0; $i < 11; $i++) {
            $number = $faker->numberBetween(0, 100);
            $numbers[] = $number;
            $rows[] = [$number];
        }

        // sort the array of numbers
        $sorter = new Sorter($numbers);

        $start = microtime(true);
        $sortedNumbers = $sorter->insertionSort();

        // display unsorted results
        $this->line('');
        $this->table($headers, $rows);

        $this->line('');
        $this->info('Sorting...');
        $this->line('');

        $headers = ['Sorted'];
        $rows = [];

        foreach ($sortedNumbers as $sortedNumber) {
            $rows[] = [$sortedNumber];
        }

        $usage = sprintf("Sorting took %s seconds", microtime(true) - $start);

        $this->line('');
        $this->info($usage);
        $this->line('');

        // display sorted results
        $this->table($headers, $rows);

        $this->line('');
        $this->info('Done!');
        $this->line('');

    }
}
