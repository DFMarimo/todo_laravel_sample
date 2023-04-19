<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class ListTask extends Component
{
    use WithPagination;

    public $title, $status;

    protected $listeners = ['refreshCus' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    public function delete(Task $task)
    {
        try {
            $task->delete();
            $this->emitTo('notification', 'flushMessage', 'success', 'وظیفه شما از لیست حذف شد.');
            $this->emitTo('list-task', 'refreshCus');
        } catch (\Exception $e) {
            $this->emitTo('notification', 'flushMessage', 'error', 'وظیفه شما از لیست حذف نشد. لطفا دوباره تلاش کنید.');
        }
    }

    public function render()
    {
        $search = $this->title;
        $status = $this->status;
        $tasks = Task::when($search, function ($query, $search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        })->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->latest()->paginate(5);

        return view('livewire.list-task', compact('tasks'));
    }
}
