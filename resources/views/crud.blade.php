
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            @livewire('crudwire::create')
            <tr>
                <th colspan="1">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search by email or username" aria-label="Search" wire:model="search">
                </th>
                <th colspan="1">
                    <label for="orderby">sort by:</label>
                    <select name="orderby" wire:model="sortby">
                        <option value="id" > id </option>
                        <option value="name"> name </option>
                        <option value="email"> email </option>
                        <option value="email_verified_at"> email verified at </option>
                    </select>
                </th>
                <th colspan="1">
                    <label for="ascdesc">sort by:</label>
                    <select name="ascdesc" wire:model="ascdesc">
                        <option value="asc" >asc</option>
                        <option value="desc">descending</option>
                    </select>
                </th>
                <th colspan="1">
                    <button wire:click="dump">dump</button>
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
            </tr>
        </thead>
        <thead>
            <tr>
                <th scope="col">user id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">email verified at</th>
                <th colspan="2">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @livewire('crudwire::show', ['user' => $user], key($user->id))
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$users->links()}}
    </div>
</div>

