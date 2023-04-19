<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TodoTask extends Component
{


    public function render()
    {
        return view('livewire.todo-task')->extends('layouts.master')->section('content');
    }
}
