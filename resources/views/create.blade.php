@extends(config('crudwire.crudwire_layout'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(isset($user)) Edit User Info @else Create New User @endif</div>

                <div class="card-body">
                    <form method="POST"
                        @if(isset($user))
                            action="{{ route('updateuser', ['id' => $user->id]) }}"
                        @else
                            action="{{ route('createuser',) }}"
                        @endif>
                        @csrf
                        @foreach ($fillables as $fillable )
                            @if ($fillable === "password")
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        @unless (isset($user))
                                            required
                                        @endunless
                                        autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                        @unless (isset($user))
                                            required
                                        @endunless
                                        autocomplete="new-password">
                                    </div>
                                </div>
                            @else
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __($fillable) }}</label>

                                    <div class="col-md-6">
                                        <input id="{{$fillable}}" @if($fillable === "email")type="email" @else type="text" @endif class="form-control @error($fillable) is-invalid @enderror" name="{{$fillable}}"
                                        @if(old($fillable))value="{!! old($fillable) !!}" @elseif(isset($user))value="{!! $user->$fillable !!}" @endif  required autocomplete="{{$fillable}}" autofocus>

                                        @error($fillable)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
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
