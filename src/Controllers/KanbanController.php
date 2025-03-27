<?php

namespace NickKlein\Kanban\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class KanbanController extends Controller
{
    public function index()
    {
        return Inertia::render('Kanban/Index');
    } 
}
