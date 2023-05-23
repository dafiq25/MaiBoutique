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
    <title>Edit Cart</title>
</head>
<body>
    <div class="container">
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

            <div class="mt-3 text-center">
                    <h1>Edit Cart</h1>
                </div>
            <div class="col-md-7 mt-5 mx-auto">
                <div class="card shadow-sm">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card shadow-sm m-2">
                                <img class="bd-placeholder-img card-img-top" width="100%" src="/storage/{{$data[0]->image_product}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card shadow-sm" style="margin-top:10px; margin-right:10px; margin-left:0px; margin-bottom:10px">
                                <div class="m-2">
                                    <h2>{{$data[0]->name}}</h2>
                                    <h5>Rp.{{$data[0]->price}}</h5>
                                    <hr>
                                    <h6>Product Detail</h6>
                                    <p>{{$data[0]->desc}}</p>
                                    <hr style="border-top: 9px solid grey">
                                    @if(Auth::user()->role == 'admin')
                                    <div class="row mb-3">
                                        <div class="col-md-6" style="padding-left:10px">
                                            <a type="button" href="/home" class="btn btn-danger col-12">Back</a>
                                        </div>
                                        <a type="button" href="/home" class="btn btn-danger col-4">Delete Item</a>
                                    </div>
                                    @elseif(Auth::user()->role == 'member')
                                    <form action="/update-cart/{{$data[0]->id_cart}}" method="post">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-6" style="padding-right:3">
                                                <label for="quantity" class="form-label"><b>Quantity :</b></label>
                                                <input class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity" value="{{$data[0]->quantity}}" type="number">
                                                @error('quantity')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6" style="padding-left:0">
                                                <br>
                                                <button style="margin-top:8px" type="submit" class="btn btn-success col-12">Update Cart</button>
                                            </div>
                                        </div>
                                        <a type="button" href="/home" class="btn btn-danger col-12">Back</a>

                                    </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
    </div>
</body>
</html> 