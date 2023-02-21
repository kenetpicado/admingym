<div class="card-body">
    @isset($header)
        {{ $header }}
    @endisset
    
    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0" role="grid">
        <thead>
            <tr class="text-primary text-uppercase small">
                {{ $title }}
            </tr>
        </thead>
        {{ $slot }}
    </table>
    @isset($links)
        <div class="small">
            {{ $links }}
        </div>
    @endisset
    <style>
        .table td {
            vertical-align: middle;
        }
    </style>
</div>
