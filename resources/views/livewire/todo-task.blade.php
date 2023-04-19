<div class="container">
    <div class="row my-2">
        <div class="col-md-6 offset-md-3 col-12">
            {{--Alert Modal--}}
            <livewire:notification></livewire:notification>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 col-12">
            {{--Create Tasks--}}
            <livewire:create-task></livewire:create-task>
        </div>
        <div class="col-md-6 col-lg-8 col-12">
            <div wire:loading>
                <div class="d-flex align-items-center justify-content-center">
                    <div class="spinner-border spinner-border-lg"></div>
                    <span class="px-3"><strong>Loading ...</strong></span>
                </div>
            </div>
            {{--List And Filter--}}
            <livewire:list-task></livewire:list-task>
        </div>
    </div>

    {{--Edit Modal--}}
    <livewire:edit-task></livewire:edit-task>
</div>
