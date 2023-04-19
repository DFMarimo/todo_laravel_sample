<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class EditTask extends Component
{
    public $task, $title, $description, $status;

    protected $rules = [
        'title' => ['required', 'min:3'],
        'description' => ['required', 'min:3'],
        'status' => ['required'],
    ];

    protected $listeners = ['showTaskForEdit'];

    public function showTaskForEdit(Task $task)
    {
        $this->task = $task;
        $this->emit('editEmit');
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
    }

    public function editTask()
    {
        $this->validate();
        try {
            $this->task->update([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            $this->emitTo('notification', 'flushMessage', 'success', 'وظیفه شما ویرایش شد.');
            $this->emitTo('list-task', 'refreshCus');
            $this->emit('closeModal');

        } catch (\Exception $e) {
            $this->emitTo('notification', 'flushMessage', 'error', 'وظیفه شما ویرایش نشد. لطفا دوبتره تلاش کنید.');
        }
    }

    public function render()
    {
        return view('livewire.edit-task');
    }
}
