
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('AuthAssets/css/profile.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="m" dir="rtl">
    <div id="card">
        <div class="left-container">
            <img class="img" src="{{ asset('images/avatar.png') }}" alt="Avatar">
            <h2 class="gradienttext">{{ $user->name }}</h2> <!-- نام کاربر -->
            <p class="p">ایمیل: {{ $user->email }}</p> <!-- ایمیل کاربر -->
        </div>
        <div class="right-container">
            <h3 class="gradienttext" style="color: rgba(252, 189, 21, 1)">
                پروفایل کاربر
            </h3>
            <div class="wrapper">
                <table class="textAll">
                    <tr>
                        <td>نام کاربری :</td>
                        <td>{{ $user->name }}</td> <!-- نام کاربری -->
                    </tr>
                    <tr>
                        <td>رمز عبور:</td>
                        <td>********</td> <!-- رمز عبور را به طور مستقیم نمایش نمی‌دهیم -->
                    </tr>
                    <tr>
                        <td>ایمیل :</td>
                        <td>{{ $user->email }}</td> <!-- ایمیل کاربر -->
                    </tr>

                </table>
            </div>
        </div>
    </div>
</body>
</head>
