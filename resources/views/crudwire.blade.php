@extends('layouts.app')

@section('content')

    @if (session('crudwire'))
        <div class="alert alert-success">
            {{ session('crudwire') }}
        </div>
    @endif

    @livewire('crudwire::crud')
@endsection
