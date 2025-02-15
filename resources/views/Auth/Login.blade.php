<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="{{asset("AuthAssets/css/register.css")}}">
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
                                    <p class="text-center h1 fw-bold mb-4">ثبت نام</p> <!-- Reduced margin bottom -->

                                    <form action="{{ route('Login') }}" method="POST" enctype="multipart/form-data" id="my-form">
                                        @csrf

                                        <!-- Name Field -->
               
                                        <!-- Email Field -->
                                        <div class="d-flex flex-row align-items-center mb-3 input-icon"> <!-- Reduced margin bottom -->
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" id="form3Example3c" class="form-control" value="{{ old('email') }}" />
                                                <label class="form-label" for="form3Example3c">ایمیل</label>
                                            </div>
                                        </div>


                                        <!-- Error message -->
                                        @if(session('error'))
                                            <div class="alert-required mb-3"> <!-- Reduced margin bottom -->
                                                <strong>{{ session('error') }}</strong>
                                            </div>
                                        @endif

                                        <!-- Password Field -->
                                        <div class="d-flex flex-row align-items-center mb-3 input-icon"> <!-- Reduced margin bottom -->
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" id="form3Example6c" class="form-control" />
                                                <label class="form-label" for="form3Example6c">رمز</label>
                                            </div>
                                        </div>

                                        <!-- Sign-in link -->
                                        <div class="form-check d-flex justify-content-center mb-4"> <!-- Reduced margin bottom -->
                                            <label class="form-check-label" for="form2Example3">
                                                اگر حساب کاربری ندارید <a href="{{ route('Register') }}">ثبت نام کنید</a>
                                            </label>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="d-flex justify-content-center mb-3">
                                            <button type="submit" class="btn btn-primary">ورود </button>
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
