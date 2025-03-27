<?php

namespace NickKlein\Kanban\Seeders;

use NickKlein\Kanban\Models\Comment;
use NickKlein\Kanban\Models\Card;
use Faker\Factory as Faker;

class CommentSeeder
{
    /**
     *  Seed Kanban Comment data
     *
     * @return void
     */
    public function run(int $count = 3)
    {
        $faker = Faker::create();
        Comment::unguard();
        
        // Get all card IDs
        $cardIds = Card::pluck('id')->toArray();
        
        if (empty($cardIds)) {
            // If no cards exist, create some with their columns and boards
            $cardSeeder = new CardSeeder();
            $cardSeeder->run(5);
            $cardIds = Card::pluck('id')->toArray();
        }
        
        foreach ($cardIds as $cardId) {
            // Create random number of comments (up to $count) for each card
            $commentsToCreate = rand(0, $count);
            
            for ($i = 0; $i < $commentsToCreate; $i++) {
                Comment::create([
                    'content' => $faker->paragraph(rand(1, 3)),
                    'card_id' => $cardId,
                    'user_id' => 1, // TODO: Hard-coded for now, same as in BoardSeeder
                ]);
            }
        }
        
        Comment::reguard();
    }
}
