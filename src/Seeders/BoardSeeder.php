<?php

namespace NickKlein\Kanban\Seeders;

use NickKlein\Kanban\Models\Board;
use Faker\Factory as Faker;

class BoardSeeder
{
    /**
     *  Seed Kanban Board data
     *
     * @return void
     */
    public function run(int $count = 1)
    {
        $faker = Faker::create();
        Board::unguard();
        for($row = 0; $row <= $count; $row++) {
            Board::create([
                'title' => $faker->name,
                'description' => $faker->text(200),
                'user_id' => 1, //TODO: Hard-coded for now
            ]);
        }
        Board::reguard();
    }
}
