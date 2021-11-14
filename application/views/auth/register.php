<div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3><?= APP_NAME ?></h3>
                    <p><?= APP_SUGGESTION ?></p>
                    <img src="<?= base_url(); ?>assets/auth/images/graphic5.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="website-logo-inside">
                            <a href="#">
                                <img class="logo-size" src="<?= base_url(); ?>assets/logo.png" alt="">
                            </a>
                        </div>
                        <div class="page-links">
                            <a href="<?= base_url('/') ?>" >Login</a>
                            <a href="#" class="active">Registrasi Pedagang Baru</a>
                        </div>
                        <div class="alert alert-danger bg-danger" style='display:none;' id="msg-pass">
                                <span></span>
                        </div>
                        <form method="post" id="form-data">
                            <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama lengkap" required>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email ( Cth : example@email.com )" required>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username" required>
                            <input class="form-control" type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required onkeyup="checkPass();">
                            <input class="form-control" type="password" name="confirm" id="confirm" placeholder="Konfirmasi Password" required onkeyup="checkPass();">
                            <div class="form-button">
                                <button type="button" class="btn disbled" id="btnSimpan">Registrasi</button> <a href="<?= base_url('forgot-password') ?>">Forgot password?</a>
                            </div>
                        </form>
                        <div class="other-links">
                            <span><?= APP_COPYRIGHT ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>