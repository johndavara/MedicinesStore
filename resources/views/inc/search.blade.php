<div class="row">
    <div class="col-md-12">
        <div class="d-flex flex-row-reverse">
            <form class="form-inline" method="GET" action="{{ action('SearchController@search') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name ="search" id="search" placeholder="Buscar un producto">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>
        </div>
    </div>
</div>