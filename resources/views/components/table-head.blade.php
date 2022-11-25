<div class="card-body">
    {{ $header }}
    <table class="table table-borderless table-striped" id="dataTable" width="100%" cellspacing="0" role="grid">
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
<style>
    .table td {
        vertical-align: middle;
    }
</style>
</div>
