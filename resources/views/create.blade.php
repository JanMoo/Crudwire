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
                        @if(isset($user))
                            @method('PUT')
                        @endif
                        @include('crudwire::form.switch')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    save changes
                                </button>
                                <a href="{{ route('crudwire.user.index')}}"class="btn btn-danger">
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
