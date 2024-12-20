@extends('layout.app')
@section('content')
    <main>
        <div class="container">
            <section
                    class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <?php
                                if (isset($_SESSION['message'])):
                                    if ($_SESSION['message'] == "LOGIN SUCCESSFUL") {
                                        ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong><?= $_SESSION['message'] ?></strong>
                                            <button type="submit" name="delete-message" class="btn-close"
                                                    data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong><?= $_SESSION['message'] ?></strong>
                                            <form method="post" action="<?= url('core/functions.php') ?>">
                                                <input type="hidden"
                                                       value="<?= "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>"
                                                       name="old_path">
                                                <button type="submit" name="delete-message" class="btn-close"
                                                        data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                            </form>
                                        </div>
                                    <?php }
                                endif ?>
                                <div class="card-body">

                                    <div class="pt-0 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post">

                                        <div class="col-12">
                                            <label for="youremail" class="form-label">E-mail</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control" id="youremail"
                                                       required>
                                                <div class="invalid-feedback">Please enter your email.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                   id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="login" type="submit">Login
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a
                                                        href="{{route('register')}}">Create an account</a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                Designed by Mohamed Tarek
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

@endsection
