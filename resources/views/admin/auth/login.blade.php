@extends('admin.layout.auth')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default account-authentication-section">
                    <div class="panel-heading">Administrator Login</div>
                    <div class="panel-body">
                        <form role="form" method="POST"
                              action="{{ route('admin.login') }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" placeholder="E-Mail Address" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password"
                                       placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="checkbox col-md-4">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember
                                        </label>
                                    </div>

                                    <div class="col-md-8 text-right"><a class="btn btn-link"
                                                                        href="{{ url('/admin/password/reset') }}">Forgot
                                            Your Password?</a>
                                    </div>
                                </div>
                            </div>

                            {{ csrf_field() }}

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection