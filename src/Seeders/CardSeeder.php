<?php

namespace NickKlein\Kanban\Seeders;

use NickKlein\Kanban\Models\Card;
use NickKlein\Kanban\Models\Column;
use Faker\Factory as Faker;

class CardSeeder
{
    /**
     *  Seed Kanban Card data
     *
     * @return void
     */
    public function run(int $count = 5)
    {
        $faker = Faker::create();
        Card::unguard();
        
        // Get all column IDs
        $columnIds = Column::pluck('id')->toArray();
        
        if (empty($columnIds)) {
            // If no columns exist, create some with their boards
            $columnSeeder = new ColumnSeeder();
            $columnSeeder->run(3);
            $columnIds = Column::pluck('id')->toArray();
        }
        
        foreach ($columnIds as $columnId) {
            // Create random number of cards (up to $count) for each column
            $cardsToCreate = rand(1, $count);
            
            for ($i = 0; $i < $cardsToCreate; $i++) {
                Card::create([
                    'title' => $faker->sentence(rand(2, 5)),
                    'description' => $faker->paragraphs(rand(1, 3), true),
                    'column_id' => $columnId,
                    'order' => $i,
                    'due_date' => rand(0, 1) ? $faker->dateTimeBetween('+1 day', '+2 months') : null,
                ]);
            }
        }
        
        Card::reguard();
    }
}
