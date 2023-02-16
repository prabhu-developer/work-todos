<?php

namespace App\Http\Controllers;

use App\Models\Todos;

class HomeController extends Controller
{
    public $todos;

    public function __construct(Todos $todos)
    {
        $this->todos = $todos;
    }
    public function index()
    {
        $total     = $this->todos->where('user_id',auth()->user()->id)->count();
        $pending   = $this->todos->where('user_id',auth()->user()->id)->where("status",false)->count();
        $completed = $this->todos->where('user_id',auth()->user()->id)->where("status",true)->count();
        
        return view('dashboard',compact('completed','pending','total'));
    }
}
