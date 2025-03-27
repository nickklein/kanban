<?php

namespace NickKlein\Kanban\Commands;

use Illuminate\Console\Command;
use NickKlein\Kanban\Seeders\BoardSeeder;
use NickKlein\Kanban\Seeders\CardSeeder;
use NickKlein\Kanban\Seeders\ColumnSeeder;
use NickKlein\Kanban\Seeders\CommentSeeder;

class RunSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:kanban-seeder';

    /**
     * The console Clean up user related things.
     *
     * @var string
     */
    protected $description = 'Runs Seeder for Kanban';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private BoardSeeder $boardSeeder, private ColumnSeeder $columnSeeder, private CardSeeder $cardSeeder, private CommentSeeder $commentSeeder)
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
        $this->boardSeeder->run(2);
        $this->columnSeeder->run(4);
        $this->cardSeeder->run(20);
        $this->commentSeeder->run(100);
    }
}
