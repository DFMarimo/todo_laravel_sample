<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\Tasks;
use Livewire\Component;

class CreateTask extends Component
{
    public $title, $description, $status;

    protected $rules = [
        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:3'],
        'status' => ['required'],
    ];

    public function createTask()
    {
        $this->validate();

        try {
            Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            $this->reset(['title', 'description', 'status']);

            $this->emitTo('notification', 'flushMessage', 'success', 'وظیفه شما به لیست اضافه شد.');
            $this->emitTo('list-task', 'refreshCus');

        } catch (\Exception $e) {
            $this->emitTo('notification', 'flushMessage', 'error', 'وظیفه شما به لیست اضافه نشد. لطفا دوبتره تلاش کنید.');
        }

    }

    public function render()
    {
        return view('livewire.create-task');
    }
}
