@extends(config('crudwire.crudwire_layout'))

@section('content')

    @if (session('crudwire'))
        <div class="alert alert-success">
            {{ session('crudwire') }}
        </div>
    @endif

    @livewire('crudwire::crud')
@endsection
