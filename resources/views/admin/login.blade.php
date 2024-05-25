<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .backgroundLogin {
            background-image: url('{{ asset('admin_assets/images/login/online2.jpg') }}') !important;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .back{
            background-color: #ffffff25;
            border-radius: 1.2rem;
        }
    </style>
</head>

<body class="backgroundLogin">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-white">
                    <div class="back shadow-lg" style="border-radius: 1.2rem;">
                        <div class="card-body p-5">
                            @include('admin.message')
                            <h3 class="mb-5 text-center text-uppercase fs-3 fw-bold"> onlineStore
                            </h3>
                            <form action="{{ route('admin.authenticate') }}" method="POST">
                                @csrf
                                <div class="form-floating mb-3 mt-3">
                                    <input type="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Enter email" name="email">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" placeholder="Enter password" name="password">
                                    <label for="password">Mot de passe</label>
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Souvenir de moi</label>
                                    </div>
                                    <a href="#!" class="text-white">Mot de passe oublié ?</a>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2">Connexion</button>

                                <hr class="my-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="#"  class="d-flex align-items-center justify-content-center btn btn-danger px-2 w-100 me-3"><span class="me-2"><i class="fa fa-google-plus-square fa-2x"></span></i>Google</a>
                                    <a href="#" class="d-flex align-items-center justify-content-center btn btn-primary px-2 w-100"><span class="me-2"><i class="fa fa-facebook-square fa-2x"></span></i>Facebook</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
