<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIEVDEV | Login</title>
    {{ Html::style('admin/css/all.css') }}
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">KD</h1>
            </div>
            <h3>Welcome to Kievdev</h3>
            <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">{{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" placeholder="E-mail" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox" name="remember"><i></i> Remember me </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <a class="btn btn-link" href="{{ url('/password/reset') }}"><small>Forgot Your Password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{url('/register')}}">Create an account</a>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    {{ Html::script('admin/js/jquery-2.1.1.js') }}
    {{ Html::script('admin/js/bootstrap.min.js') }}
    {{ Html::script('admin/js/plugins/iCheck/icheck.min.js') }}
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });
        });
    </script>
</body>
</html>
