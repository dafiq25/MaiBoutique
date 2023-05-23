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
    <title>Profile</title>
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
        <div class="text-center mb-3">
            <h1>Check What You've Bought!</h1>
        </div>
        <div class="container">
            @foreach($order as $o)
            <div class="col-md-12 mt-3 mx-auto">
                <div class="card shadow-sm" style="background-color: rgba(33, 37, 41, 0.03)">
                    <div class="card-body">
                        <h5>2022-01-27</h5>
                        <ul>
                            @foreach($item as $i)
                            @if($i->id_pemesanan == $o->id_pemesanan)
                            <li>{{$i->quantity}} pc(s) {{$i->name}}  Rp.{{$i->price}}</li>
                            @endif
                            @endforeach
                        </ul>
                        <h5>Total Price Rp.{{$o->total_price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html> 