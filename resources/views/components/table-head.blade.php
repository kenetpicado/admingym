<div class="card-body">
    <div class="table-responsive">
        <table class="table table-borderless dataTable" id="dataTable" width="100%" cellspacing="0" role="grid">
            <thead>
                <tr class="text-primary text-uppercase small">
                    {{ $title }}
                </tr>
            </thead>
            {{ $slot }}
        </table>
    </div>
</div>
