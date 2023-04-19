<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Notification extends Component
{

    protected $listeners = ['flushMessage'];

    public function flushMessage($type, $text)
    {
        session()->flash($type, $text);
    }

    public function render()
    {
        return view('livewire.notification');
    }
}
