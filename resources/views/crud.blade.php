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
                                <th colspan="3">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search by email or username" aria-label="Search" wire:model.debounce.250ms="search">
                                </th>
                                <th colspan="2">
                                    <label for="orderby">sort by:</label>
                                    <select name="orderby" wire:model="sortBy">
                                        @foreach ($columns as $columnName)
                                           <option value="{{$columnName}}">{{str_replace('_',' ',$columnName )}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th colspan="2">
                                    <label for="ascdesc">sort by:</label>
                                    <select name="ascdesc" wire:model="ascDesc">
                                        <option value="asc" >asc</option>
                                        <option value="desc">descending</option>
                                    </select>
                                </th>
                                <th colspan="{{ $columnCount = count($columns)-5}} "></th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <a href="{{route('crudwire.user.create')}}" class="btn btn-primary">create new user</a>
                                </th>
                                <th colspan="2">
                                    results per page: {{$pagination}}
                                </th>
                                <th colspan="{{ $columnCount+2}}"></th>
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

