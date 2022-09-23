@props(['route'])
<div class="card-body">
    <div class="row">
        <form method="POST" action="{{ route($route) }}" class="col-12 col-sm-6">
            @csrf
            <div class="input-group">
                <input type="search" class="form-control" name="search" placeholder="Buscar por nombre o ID">
                <div class="input-group-append">
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
