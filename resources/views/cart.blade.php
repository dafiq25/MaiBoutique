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
    <title>Cart</title>
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
        <h1 style="text-align:center">My Cart</h1>
        <!-- <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
            </ul>

            <div class="dropdown text-end">
                <ul class="nav nav-pills">
                    <li class="nav-item"><h4>Total Price: Rp.{{$totalPrice}}</h4></li>
                    <li class="nav-item" style="margin-right:10px"><a href="/addItem" type="button" class="btn btn-outline-primary"><i class="bi bi-upload"></i> Add Item</a></li>
                </ul>
            </div>
        </div> -->
        
        <div class="form-goup text-end">
            <!-- <h4>TotalPrice</h4> -->
            <label style="font-size:20px; margin-right:10px; font-weight:500">Total Price: Rp.{{$totalPrice}}</label>
            <a href="/checkout" type="button" class="btn btn-primary">Check Out({{$data->count()}})</a>
        </div>
        <div class="row mt-1">
            @foreach($data as $d)
            <div class="col-md-3 mt-4">
                <div class="card shadow-sm">
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="storage/{{$d->image_product}}" alt="">
                    <div class="card-body">
                        <b>{{$d->name}}</b>
                        <p>Rp.{{$d->price}}</p>
                        <p>Qty: {{$d->quantity}}</p>
                        <a href="/edit-cart/{{$d->id_cart}}" type="button" class="btn btn-primary">Edit Cart</a>
                        <a href="/delete-cart/{{$d->id_cart}}" type="button" class="btn btn-danger">Remove from Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>