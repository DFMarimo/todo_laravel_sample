<div class="modal fade" id="editModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ویرایش وظیفه</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="editTask" dir="rtl">
                    <div class="my-4">
                        <label class="form-label" for="title">عنوان :</label>
                        <input wire:model.defer="title" placeholder="وظیفه جدید ..." type="text" id="title"
                               class="form-control">
                        @error('title')
                        <div class="text-danger"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <div class="my-4">
                        <label class="form-label" for="status">وضعیت :</label>
                        <select wire:model.defer="status" class="form-select" id="status">
                            <option value="">اتخاب کنید</option>
                            <option value="completed">انجام شده</option>
                            <option value="pending">درحال پیگیری</option>
                            <option value="canceled">لغو شده</option>
                        </select>
                    </div>

                    <div class="my-4">
                        <label class="form-label" for="description">توضیحات :</label>
                        <textarea wire:model.defer="description" placeholder="توضیحات" rows="5"
                                  class="form-control" id="description"></textarea>
                        @error('description')
                        <div class="text-danger"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <button class="btn btn-dark w-100">
                        <div wire:loading wire:target="editTask">
                            <div class="spinner-border spinner-border-sm"></div>
                        </div>
                        ویرایش
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
