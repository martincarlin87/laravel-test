<?php

use App\Models\Position;

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::truncate();

        for ($i = 1; $i <= count(Position::POSITIONS); $i++) {
            Position::create([
                'name' => Position::POSITIONS[$i],
            ]);
        }
    }
}
