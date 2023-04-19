<div class="card p-3 shadow border-0">
    <form wire:submit.prevent="createTask" dir="rtl">
        <h4 class="text-center"><strong>ایجاد وظیفه </strong></h4>
        <div class="my-4">
            <label class="form-label" for="title">عنوان :</label>
            <input wire:model="title" placeholder="وظیفه جدید ..." type="text" id="title"
                   class="form-control">
            @error('title')
            <div class="text-danger"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <div class="my-4">
            <label class="form-label" for="status">وضعیت :</label>
            <select wire:model="status" class="form-select" id="status">
                <option value="">اتخاب کنید</option>
                <option value="completed">انجام شده</option>
                <option value="pending">درحال پیگیری</option>
                <option value="canceled">لغو شده</option>
            </select>
        </div>

        <div class="my-4">
            <label class="form-label" for="description">توضیحات :</label>
            <textarea wire:model="description" placeholder="توضیحات" rows="5"
                      class="form-control" id="description"></textarea>
            @error('description')
            <div class="text-danger"><strong>{{ $message }}</strong></div>
            @enderror
        </div>

        <button class="btn btn-dark w-100">
            <div wire:loading wire:target="createTask">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
            افزودن به لیست
        </button>
    </form>
</div>
