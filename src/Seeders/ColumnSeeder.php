<?php

namespace NickKlein\Kanban\Seeders;

use NickKlein\Kanban\Models\Column;
use NickKlein\Kanban\Models\Board;
use Faker\Factory as Faker;

class ColumnSeeder
{
    /**
     *  Seed Kanban Column data
     *
     * @return void
     */
    public function run(int $count = 3)
    {
        $faker = Faker::create();
        Column::unguard();
        
        // Get all board IDs
        $boardIds = Board::pluck('id')->toArray();
        
        if (empty($boardIds)) {
            // If no boards exist, create one
            $boardSeeder = new BoardSeeder();
            $boardSeeder->run(1);
            $boardIds = Board::pluck('id')->toArray();
        }
        
        foreach ($boardIds as $boardId) {
            // Default column names for Kanban
            $defaultColumns = ['To Do', 'In Progress', 'Done'];
            
            for ($i = 0; $i < count($defaultColumns); $i++) {
                Column::create([
                    'title' => $defaultColumns[$i],
                    'board_id' => $boardId,
                    'order' => $i,
                ]);
            }
            
            // Add additional random columns if count > 3
            for ($i = 3; $i < $count; $i++) {
                Column::create([
                    'title' => $faker->word,
                    'board_id' => $boardId,
                    'order' => $i,
                ]);
            }
        }
        
        Column::reguard();
    }
}
