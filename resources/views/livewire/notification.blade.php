<div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif
</div>
