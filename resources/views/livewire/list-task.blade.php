<div class="card shadow border-0 p-3">

    <form class="row align-items-end border-bottom pb-3 mb-2" wire:submit.prevent="$refresh">
        <div class=" col-auto">
            <label class="form-label" for="title">عنوان :</label>
            <input wire:model="title" type="text" id="title"
                   class="form-control">
        </div>

        <div class=" col-auto">
            <label class="form-label" for="status">وضعیت :</label>
            <select wire:model="status" class="form-select" id="status">
                <option value="">اتخاب کنید</option>
                <option value="completed">انجام شده</option>
                <option value="pending">درحال پیگیری</option>
                <option value="canceled">لغو شده</option>
            </select>
        </div>
    </form>

    <div wire:loading>
        <div class="spinner-border"></div>
        Loading ...
    </div>
    <div wire:loading.remove>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">عمیلات</th>
                <th scope="col">توضیحات</th>
                <th scope="col">وضعیت</th>
                <th scope="col">عنوان</th>
                <th scope="col">ID</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>

            @foreach($tasks as $index => $task)
                <tr>
                    <td>
                        <div>
                            <button wire:click="delete({{$task->id}})" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    wire:click="$emitTo('edit-task' , 'showTaskForEdit' , {{ $task->id }})"
                                    data-bs-target="#editModal">
                                <i class="bi bi-gear-fill"></i>
                            </button>
                        </div>
                    </td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if($task->status == "pending")
                            <span class="text-warning"> {{ $task->statusName }}</span>
                        @elseif($task->status == "completed")
                            <span class="text-success"> {{ $task->statusName }}</span>
                        @else
                            <span class="text-danger"> {{ $task->statusName }}</span>
                        @endif

                    </td>
                    <td>{{ $task->title }}</td>
                    <th>{{ $task->id }}</th>
                    <th>{{ $tasks->firstItem() + $index }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>
</div>
