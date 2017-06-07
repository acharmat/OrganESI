@extends('auth.layouts.layout')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <b>Organ</b>ESI
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">الدخول الى حساب الأستاذ</p>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 ">
                                <div class="col-xs-6 ">
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                                            تسجيل الدخول
                                        </button>

                                    </div>
                                </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <div class="checkbox icheck ">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرني
                                        </label>
                                    </div>
                                </div>
                            </div>




                            </div>
                        </div>

                    </form>


                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
@endsection

@section('footer')

@endsection
