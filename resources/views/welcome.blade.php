<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <form class="" action=" {{ Route('postlogin') }}" method="post">
            @if(session('err'))
                <div class="alert alert-warning" role="alert"> {{ session('err')}}</div>
            @endif
            {{ csrf_field()}}
            <h3>Đăng nhập</h3>
            <div class="form-group  {{  ($errors->first('email'))?'has-error':''}}">
                <label for="email">E-mail</label>
                <input type="email" name="email"
                       class="form-control" id="email" placeholder="E-mail" value=" {{  old('email')}}">
                @if($errors->first('email'))
                    <p class="text-danger"> {{ $errors->first('email')}}</p>
                @endif
            </div>
            <div class="form-group  {{  ($errors->first('password'))?'has-error':''}}">
                <label for="password">Mật khẩu</label>
                <input type="password"
                       name="password" class="form-control" id="password"
                       placeholder="Mật khẩu">
                @if($errors->first('password'))
                    <p class="text-danger"> {{ $errors->first('password')}}</p>
                @endif
            </div>
            <div class="checkbox">
                <label> <input type="checkbox" name="remember" value="1"> Ghi nhớ tài khoản
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </body>
</html>
