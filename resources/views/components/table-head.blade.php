<div class="card-body">
    @isset($header)
        {{ $header }}
    @endisset
    
    <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0" role="grid">
        <thead>
            <tr class="text-primary text-uppercase small">
                {{ $title }}
            </tr>
        </thead>
        {{ $slot }}
    </table>
    @isset($likes)
        <div class="small">
            {{ $likes }}
        </div>
    @endisset
    <style>
        .table td {
            vertical-align: middle;
        }
    </style>
</div>
