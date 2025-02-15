<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پروفایل</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('AuthAssets/css/register.css') }}">
</head>
<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-12 col-xl-12">
                                    <p class="text-center h1 fw-bold mb-4">پروفایل</p>

                                    <!-- Display User Information -->
                                    <div class="mb-3">
                                        <strong>نام:</strong>
                                        <p>{{ $user->name }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>ایمیل:</strong>
                                        <p>{{ $user->email }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>آدرس:</strong>
                                        <p>{{ $user->address }}</p>
                                    </div>

                                    <div class="mb-3">
                                        <strong>شماره تلفن:</strong>
                                        <p>{{ $user->phone }}</p>
                                    </div>

                                    <!-- Optionally, you can add a button to edit profile or log out -->
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="btn btn-primary">ویرایش پروفایل</a>
                                    </div>

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
