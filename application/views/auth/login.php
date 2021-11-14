<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="#">
                                        <img src="<?= base_url() ?>assets/images/logo.png" alt="" height="24" />
                                        <h3 class="d-inline align-middle ml-1 text-logo">Shreyu</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                                <p class="text-muted mt-1 mb-4">Enter your username and password to
                                    access admin panel.</p>

                                <form action="#" class="authentication-form" id="form-data" method="post">
                                    <div class="form-group">
                                        <label class="form-control-label">Username</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Username" required>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Password</label>
                                        <a href="<?= base_url('forgot-password') ?>"
                                            class="float-right text-muted text-unline-dashed ml-1">Forgot your
                                            password?</a>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Password" required name="password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                                checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember
                                                me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In
                                        </button>
                                    </div>
                                </form>
                                
                                
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                    <div class="auth-user-testimonial">
                                        <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                        <p class="lead">"It's a elegent templete. I love it very much!"</p>
                                        <p>- Admin User</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->