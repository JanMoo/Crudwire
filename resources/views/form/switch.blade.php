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
