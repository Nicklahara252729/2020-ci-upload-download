<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="#">
                                        <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="24" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Shreyu</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Reset Password</h6>
                                <p class="text-muted mt-1 mb-5">
                                    Enter your email address and we'll send you an email with instructions to reset your
                                    password.
                                </p>

                                <form action="#" class="authentication-form" method="post" id="form-data">
                                    <div class="form-group">
                                        <label class="form-control-label">Email Address</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="administrator@email.com" required name="email">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                        <p class="lead">"It's a elegent templete. I love it very much!"
                                        </p>
                                        <p>- Admin User</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Back to <a href="<?= base_url('/') ?>"
                                class="text-primary font-weight-bold ml-1">Login</a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->