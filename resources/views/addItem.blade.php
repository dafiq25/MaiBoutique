<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Add Item</title>
</head>
<body>
    <header class="p-3 mb-3 border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <H5 style="margin-right: 10px">MAI BOUTIQUE</H5>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
                @if(Auth::user()->role == 'member')
                <li><a href="/home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                <li><a href="/cart" class="nav-link px-2 link-dark">Cart</a></li>
                <li><a href="/history" class="nav-link px-2 link-dark">History</a></li>
                <li><a href="/profile" class="nav-link px-2 link-dark">Profile</a></li>
                @elseif(Auth::user()->role == 'admin')
                <li><a href="/home" class="nav-link px-2 link-dark">Home</a></li>
                <li><a href="/search" class="nav-link px-2 link-dark">Search</a></li>
                <li><a href="/profile" class="nav-link px-2 link-dark">Profile</a></li>
                @endif
            </ul>

            <div class="dropdown text-end">
                <ul class="nav nav-pills">
                    @if(Auth::user()->role == 'member')
                    <li class="nav-item"><a href="/logout" type="button" class="btn btn-outline-primary"><i class="bi bi-box-arrow-left"></i> Sign Out</a></li>
                    @elseif(Auth::user()->role == 'admin')
                    <li class="nav-item" style="margin-right:10px"><a href="/addItem" type="button" class="btn btn-outline-primary"><i class="bi bi-upload"></i> Add Item</a></li>
                    <li class="nav-item"><a href="/logout" type="button" class="btn btn-outline-primary"><i class="bi bi-box-arrow-left"></i> Sign Out</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </header>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white mb-5" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <div class="mb-md-5 mt-md-4">

                    <h2 class="fw-bold mb-5 text-uppercase">Add Item</h2>
                    <form action="/itemAdded" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-outline form-white mb-4" style="text-align:left">
                            <label class="form-label" for="image_clothes">Clothes Image</label>
                            <input type="file" name="image" id="image_clothes" class="form-control form-control-lg @error('image') is-invalid @enderror" />
                            @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
                        <div class="form-outline form-white mb-4" style="text-align:left">
                            <label class="form-label" for="clothes_name">Clothes Name</label>
                            <input type="text" name="name" id="clothes_name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder="(5-20 letters)"/>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4" style="text-align:left">
                            <label class="form-label" for="clothes_name">Clothes Desc</label>
                            <input type="text" name="desc" id="clothes_name" class="form-control form-control-lg @error('desc') is-invalid @enderror" value="{{old('desc')}}" placeholder="(min 5 letters)"/>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4" style="text-align:left">
                            <label class="form-label" for="clothes_name">Clothes Price</label>
                            <input type="number" name="price" id="clothes_name" class="form-control form-control-lg @error('price') is-invalid @enderror" value="{{old('price')}}" placeholder=">1000 "/>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-outline form-white mb-4" style="text-align:left">
                            <label class="form-label" for="clothes_name">Clothes Stock</label>
                            <input type="number" name="stock" id="clothes_name" class="form-control form-control-lg @error('stock') is-invalid @enderror" value="{{old('stock')}}" placeholder=">1"/>
                            @error('stock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
        
        
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Add</button>
                    </form>

                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html> 