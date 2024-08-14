@extends('layout.root')

@section('title-page')
Login
@endsection

@section('content')
<section class="vh-100" style="background-image: url('https://static.vecteezy.com/system/resources/previews/004/242/510/original/abstract-wave-trendy-geometric-abstract-background-with-white-and-blue-gradient-vector.jpg'); background-size: cover;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="border-radius: 1rem; background: rgba(255, 255, 255, 0.5); backdrop-filter: blur(5px)">
                    <div class="card-body p-5">
                        <div class="mt-md-4">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="mb-5">Masukan Email dan Password Untuk Login</p>
                            <div class="form-group">
                                <label for="helperText">Email</label>
                                <input type="text" id="helperText" class="form-control" placeholder="masukan email anda">
                            </div>
                            <div class="form-group">
                                <label for="helperText">Password</label>
                                <input type="text" id="helperText" class="form-control" placeholder="masukan password anda">
                            </div>
                            <button class="btn btn-outline-secondary btn-lg px-5 mt-4"type="submit">Login</button>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection