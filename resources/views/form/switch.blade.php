@foreach ($fillables as $fillable )
    @if ($inputList[$fillable])
        @include($inputList[$fillable])
    @else
        @include($inputList['default'])
    @endif
@endforeach
