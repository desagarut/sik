<div class="col-md-4">
    <div class="card card-danger box-solid">
        <div class="card-header">
            <h3 class="card-title">Mahasiswa Login</h5>
                <div class="card-tools">
                    <?php if ($this->CI->cek_hak_akses('h')) : ?>
                        <a href="<?= site_url('mandiri') ?>"><span class="label label-default"> Detail</span></a>
                    <?php endif; ?>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
                </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($last_login as $key => $data) { ?>
                            <tr>
                                <td>
                                    <a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>">
                                        <div class="d-inline-block align-middle">
                                            <?php if ($data['foto']) : ?>
                                                <img src="<?= AmbilFoto($data['foto']) ?>" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <?php else : ?>
                                                <img src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <?php endif; ?>
                                            <div class="d-inline-block">
                                                <h6><?= $data['nama'] ?></h6>
                                                <p class="text-muted m-b-0"> <?= $data['nik'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="text-left"><label class="badge badge-light-danger"><?= $data['dusun'] ?></label></td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>

            <!--
                        <ul class="users-list clearfix">
                            <?php foreach ($last_login as $key => $data) { ?>
                            <li>
                            
                                <?php if ($data['foto']) : ?>-->
            <!--<img src="dist/img/user1-128x128.jpg" alt="Warga">-->
            <!--                                   <img src="<?= AmbilFoto($data['foto']) ?>" alt="Foto">
                                <?php else : ?>
                                    <img class="user-image" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
                                <?php endif; ?>
                        
                                  <a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>"><?= $data['nama'] ?> <?= $data['nik'] ?></a>
                                  <span class="users-list-date"><?= $data['dusun'] ?></span>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="card-footer text-center">
                            <a href="<?= site_url('mandiri'); ?>" class="uppercase">View All Users</a>
                        </div>-->
        </div>
    </div>
</div>