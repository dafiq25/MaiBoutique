<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Register</title>
    <style>     
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style> 
</head>
<body>
    <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
                    <form action="/register" method="post">
                    @csrf
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control form-control-lg @error('username') is-invalid @enderror" placeholder="(5-20 letter)"/>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="typePasswordX">Password</label>
                            <input type="password" name="password" id="typePasswordX" value="{{old('password')}}" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="(5-20 letter)"/>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="number">Phone Number</label>
                            <input type="number" name="phone" id="number" value="{{old('phone')}}" class="form-control form-control-lg @error('phone') is-invalid @enderror" placeholder="(10-13 numbers)" />
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-outline form-white mb-4">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control form-control-lg @error('address') is-invalid @enderror" placeholder="(min 5 letters)"/>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
        
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Submit</button>
                    </form>

                </div>

                <div>
                <p class="mb-0">Already Registered? <a href="/login" class="text-white-50 fw-bold">Sign In Here</a>
                </p>
                </div>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>