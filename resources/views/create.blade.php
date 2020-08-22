@extends(config('crudwire.crudwire_layout'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(isset($user)) Edit User Info @else Create New User @endif</div>

                <div class="card-body">
                    <form method="POST" action="{{ (isset($parameters) ) ? route($route, $parameters) : route($route) }}">
                        @csrf
                        @foreach ($fillables as $fillable )
                            @switch($fillable)

                                @case('password')
                                    @include('crudwire::form.inputs.password')
                                    @break

                                @case('name')
                                    @include('crudwire::form.inputs.name')
                                    @break

                                @case('email')
                                    @include('crudwire::form.inputs.email')
                                    @break

                                @default
                                    @include('crudwire::form.inputs.text')
                            @endswitch
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    save changes
                                </button>
                                <a href="{{ route('crudwire')}}"class="btn btn-danger">
                                    cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
