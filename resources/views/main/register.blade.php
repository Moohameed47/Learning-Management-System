@extends('layout.app')
@section('content')
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div
                            class="col-xl-8 col-lg-10 col-md-12 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <?php
                                if (isset($_SESSION['message'])):
                                    ?>
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
                                <?php
                                endif;
                                ?>

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation"
                                          action="<?= url("controller/auth/register.php") ?>" method="post"
                                          enctype="multipart/form-data">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="firstName"
                                                   required>
                                            <div class="invalid-feedback">Please, enter first name!</div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="lastName"
                                                   required>
                                            <div class="invalid-feedback">Please, enter last name!</div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="yourEmail"
                                                   required>
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                   id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="yourimage" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="yourimage">
                                            <div class="invalid-feedback">Please enter your image!</div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <label for="yourphone" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="yourphone"
                                                   required>
                                            <div class="invalid-feedback">Please enter your phone!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                       id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="send">Create
                                                Account
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{route('login')}}">Log in</a></p>
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
