<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __($fillable) }}</label>

    <div class="col-md-6">
        <input id="{{$fillable}}"  type="text" class="form-control @error($fillable) is-invalid @enderror" name="{{$fillable}}"
        @if(old($fillable))value="{!! old($fillable) !!}" @elseif(isset($user))value="{!! $user->$fillable !!}" @endif  required autocomplete="{{$fillable}}" autofocus>

        @error($fillable)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
