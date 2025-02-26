<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ویرایش پروفایل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black">
                        <div class="card-body p-md-5" style="@auth
                            order-radius: 25px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
                        @endauth">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-12 col-xl-12">
                                    <p class="text-center h1 fw-bold mb-4">ویرایش پروفایل</p>

                                    <!-- Display success/error messages -->
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('updateProfile',$user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="name" class="form-label">نام</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">ایمیل</label>
                                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">آدرس</label>
                                            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">شماره تلفن</label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">رمز عبور جدید (در صورت تمایل)</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">بروزرسانی پروفایل</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

