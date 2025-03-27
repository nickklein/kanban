<?php

namespace NickKlein\Kanban\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('kanban.prefix') . 'comments';
    }
}
