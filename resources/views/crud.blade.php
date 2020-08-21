<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">Users overview</div>

                <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search by email or username" aria-label="Search" wire:model="search">
                                </th>
                                <th colspan="2">
                                    <label for="orderby">sort by:</label>
                                    <select name="orderby" wire:model="sortby">
                                        @foreach ($columns as $columnName)
                                           <option value="{{$columnName}}">{{str_replace('_',' ',$columnName )}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th colspan="2">
                                    <label for="ascdesc">sort by:</label>
                                    <select name="ascdesc" wire:model="ascdesc">
                                        <option value="asc" >asc</option>
                                        <option value="desc">descending</option>
                                    </select>
                                </th>
                                <th colspan="{{ $columnCount = count($columns)+2-6}} "></th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <a href="{{route('newuser')}}" class="btn btn-primary">create new user</a>
                                </th>
                                <th colspan="2">
                                    <label for="results-per-page">results per page:</label>
                                    <select name="results-per-page" wire:model="results_per_page">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="150">150</option>
                                        <option value="200">200</option>
                                    </select>
                                </th>
                                <th colspan="{{ $columnCount}} "></th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                @foreach ($columns as $columnName )
                                    <th>
                                    {{str_replace('_',' ',$columnName )}}
                                    </th>
                                @endforeach
                                <th colspan="2">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @livewire('crudwire::show', ['user' => $user, 'columns' => $columns ], key($user->id))
                            @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

