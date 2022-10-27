<div class="card-body">
    {{-- @if (session('message'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif --}}
    {{ $header }}
    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0" role="grid">
        <thead>
            <tr class="text-primary text-uppercase small">
                {{ $title }}
            </tr>
        </thead>
        {{ $slot }}
    </table>
    <div class="small">
        {{ $links }}
    </div>

</div>
