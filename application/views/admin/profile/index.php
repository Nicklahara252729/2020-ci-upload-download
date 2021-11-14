<div class="profile-header">
    <div class="row">
        <div class="col">
            <div class="profile-img">
                <img src="<?=base_url()?>assets/img/user/<?php echo ($info->photo == null ? 'img_camera.jpg' : $info->photo ); ?>" alt="profile image" style="border-radius:50%;">
            </div>
            <div class="profile-name">
                <h3>
                <?php if($info->role == 'DOKTER'){ 
                    echo $info->nama_dokter;
                }else{
                    echo $info->nama;
                }
                    ?>
                </h3>
                <span><?= $info->role ?></span>
            </div>
            <div class="profile-menu">
                <ul>
                    <li>
                        <a href="javascript:void(0);" onclick="changeUsername('<?= $info->iduser ?>')">Change Username</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onclick="ubahFotoProfile('<?= $info->iduser ?>')">Change Photo</a>
                    </li>
                </ul>
                <div class="profile-status">
                    <i class="active-now"></i> Active now
                </div>
            </div>
        </div>
    </div>
</div>

<div class="profile-content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tentang</h5>
                    <ul class="list-unstyled profile-about-list">
                        <li><span>Username <a href="#"><?= $info->username ?></a></span></li>
                        <li><span>Email <a href="#"><?= $info->email ?></a></span></li>
                        <?php if($info->role == 'DOKTER'){ ?>
                            <li><span>Komoditi <a href="#"><?= $info->komoditi ?></a></span></li>
                            <li><span>Spesialis <a href="#"><?= $info->spesialis ?></a></span></li>
                        <?php }else{ ?>
                            <li><span>Provinsi <a href="#"><?= $info->provinsi ?></a></span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
