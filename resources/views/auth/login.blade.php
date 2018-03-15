<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Planning | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/dashboard/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dashboard/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dashboard/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/other/css.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href='pictures/ico.png' rel='icon' type='image/x-icon'/>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <b>KuhaKu</b> 8
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Login Untuk Memulai Sesi!</p>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/dashboard/jquery/dist/jquery.min.js"></script>
<script src="/dashboard/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>