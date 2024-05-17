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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-lg" style="border-radius: 1.2rem;">
                        <div class="card-body p-5">
                            @include('admin.message')
                            <h3 class="mb-5 text-center text-uppercase fs-3 fw-bold text-primary"> Login - onlineStore</h3>
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
                                    <a href="#!" class="text-body">Mot de passe oublié ?</a>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 py-2">Connexion</button>

                                <hr class="my-4">
                                <button type="button" class="btn btn-danger w-100 py-2 mb-3">Continuez avec
                                    Google</button>
                                <button type="button" class="btn btn-secondary w-100 py-2">Continuez avec
                                    Facebook</button>
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
