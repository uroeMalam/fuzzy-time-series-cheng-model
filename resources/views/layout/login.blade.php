<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>{{ config('app.name') }} - {{ $title }}</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <br>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    {{-- Error Alert --}}
                                    @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <h4 class="text-center">SELAMAT DATANG DI WEB</h4>
                                        <h5 class="text-center">FORECASTING PENGIRIMAN BARANG</h5>
                                    </div>
                                    <div class="card-body">
                                        @if (session()->has('loginError'))
                                        <!-- tampilan flash data halaman login -->
                                        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                          {{ session('loginError') }}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        @endif
                                        <form class="mt-4" action="/authenticate" method="POST">
                                            @csrf
                                            <div class="row">
                                                <!-- form user name -->
                                              <div class="col-lg-12">
                                                <div class="form-group">
                                                  <label class="text-dark" for="username">Username</label>
                                                  <input class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                                                    type="text" placeholder="Masukkan username" value="{{ old('username') }}" autofocus required>
                                                  @error('username')
                                                  <div class="invalid-feedback">{{ $message }}</div>
                                                  @enderror
                                                </div>
                                              </div>
                                              <!-- form password -->
                                              <div class="col-lg-12">
                                                <div class="form-group">
                                                  <label class="text-dark" for="pwd">Password</label>
                                                  <input class="form-control" id="password" name="password" type="password"
                                                    placeholder="Masukkan password">
                                                </div>
                                              </div>
                                            </div>
                                              <!-- form tombol login -->
                                              <div class="form-actions">
                                                <div class="text-right">
                                                    <button action type="submit" class="btn btn-warning">Masuk</button>
                                                  </div>
                                                </div>
                                              
                                          </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            {{-- <a href="{{url('register')}}">Belum Punya Akun? Daftar!</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
 
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>