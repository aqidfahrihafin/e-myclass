<!doctype html>
<html lang="en">
<?php foreach ($lembaga as $result): ?>

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="E-Reward LPPM Universitas Annuqayah by Aqid Fahri Hafin,S.Kom" name="description">
    <meta content="E-Reward" name="Aqid Fahri Hafin">
    <link rel="shortcut icon" href="<?php echo base_url('upload/logo/'.$result->logo); ?>">
    <link href="<?php echo base_url('public/assets/');?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url('public/assets/');?>css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/assets/');?>css/app.min.css" id="app-style" rel="stylesheet"
        type="text/css">
</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Register !</h5>
                                        <p>Sign up to continue to E-Reward <?php echo $result->nama_lembaga; ?>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="<?php echo base_url('/');?>">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?php echo base_url('upload/logo/'.$result->logo); ?>" alt=""
                                                class="rounded-circle" height="40">
                                        </span>

                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-switch mb-3">
                                            <input type="checkbox" class="custom-control-input theme-choice"
                                                id="dosenSwitch">
                                            <label class="custom-control-label" for="dosenSwitch">Dosen</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-switch mb-3">
                                            <input type="checkbox" class="custom-control-input theme-choice"
                                                id="mahasiswaSwitch">
                                            <label class="custom-control-label" for="mahasiswaSwitch">Mahasiswa</label>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <?php if ($this->session->flashdata('alert')): ?>
                                <div id="alert">
                                    <?php echo $this->session->flashdata('alert'); ?>
                                </div>
                                <script>
                                setTimeout(function() {
                                    document.getElementById("alert").remove();
                                }, <?php echo $this->session->flashdata('alert_timeout'); ?>);
                                </script>
                                <?php endif; ?>
                                <?php	$alert = $this->input->get('alert');	if ($alert === 'logout') {	echo '<div class="alert alert-info">Anda telah berhasil logout.</div>';	}?>

                                <!-- reg dosen -->
                                <form id="regDosenForm" class="form-horizontal"
                                    action="<?php echo base_url('home/reg_dosen');?>" method="post"
                                    style="display:none;">

                                    <div class="alert alert-info" role="alert" align="justify">
                                        <b>Perhatian </b> pastikan anda memasukkan data dengan benar.
                                    </div>
                                    <div class="form-group">
                                        <label for="nidn">NIDN</label>
                                        <input type="text" class="form-control" id="nidn" name="nidn" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama_dosen" required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Prodi</label>
                                        <select class="form-control" name="prodi_id">
                                            <option disabled selected>Pilih Prodi</option>
                                            <?php $no = 1; foreach ($prodi as $result) {?>
                                            <option value="<?php echo $result->prodi_id; ?>">
                                                <?php echo $result->nama_prodi; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="ttl" name="tempat_lahir"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl" name="tanggal_lahir"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Pendidikan</label>
                                        <select class="form-control" name="pendidikan" required="">
                                            <option value="SD">SD / Sederajat</option>
                                            <option value="SMP">SMP / Sederajat</option>
                                            <option value="SMA">SMA / Sederajat</option>
                                            <option value="Diploma 1 (D1)">Diploma 1 (D1)</option>
                                            <option value="diploma 2 (D2)">diploma 2 (D2)</option>
                                            <option value="S1">Sarjana (S1)</option>
                                            <option value="S2">Magister (S2)</option>
                                            <option value="S3">Doktor (S3)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">Telp/WA</label>
                                        <input type="text" class="form-control" id="telp" name="telp_dosen" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat_dosen" id="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label><br>
                                        <small style="color: red;">Pastikan email yang anda masukan aktif!</small>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email" required="">
                                    </div>
                                    <div class="alert alert-info">
                                        <div
                                            class="custom-control custom-checkbox custom-checkbox-outline  custom-checkbox-primary ">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customCheck-outlinecolor4" required>
                                            <label class="custom-control-label" for="customCheck-outlinecolor4">
                                                <small align="justify">
                                                    Dengan ini saya menyatakan bahwa data yang saya berikan adalah benar
                                                    dan saya memberikan izin untuk penggunaan data tersebut sesuai
                                                    dengan kebijakan privasi yang berlaku.
                                                </small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>
                                </form>

                                <!-- reg mahasiswa -->
                                <form id="regMahasiswaForm" class="form-horizontal"
                                    action="<?php echo base_url('home/reg_mahasiswa');?>" method="post"
                                    style="display:none;">
                                    <div class="alert alert-warning" role="alert" align="justify">
                                        <b>Perhatian </b> pastikan anda memasukkan data dengan benar.
                                    </div>
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama_mahasiswa"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Angkatan</label>
                                        <select class="form-control" name="tahun_ajaran_id">
                                            <?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
										foreach ($tahunajaran as $tahun) {?>
                                            <option value="<?php echo $tahun->tahun_ajaran_id; ?>">
                                                <?php echo $tahun->nama_tahun; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Prodi</label>
                                        <select class="form-control" name="prodi_id">
                                            <?php $no = 1; foreach ($prodi as $result) {?>
                                            <option value="<?php echo $result->prodi_id; ?>">
                                                <?php echo $result->nama_prodi; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <!-- Kolom 2 -->
                                    <div class="form-group">
                                        <label for="ttl">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="ttl" name="tempat_lahir"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl" name="tanggal_lahir"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="telp_mahasiswa">Telp/WA</label>
                                        <input type="telp_mahasiswa" class="form-control" id="telp_mahasiswa"
                                            name="telp_mahasiswa" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat_mahasiswa" id="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <br>
                                        <small style="color: red;">Pastikan email yang anda masukan aktif!</small>
                                        <input type="email" class="form-control" id="email" name="email" required="">
                                    </div>
                                    <div class="alert alert-warning">
                                        <div
                                            class="custom-control custom-checkbox custom-checkbox-outline  custom-checkbox-warning ">
                                            <input type="checkbox" class="custom-control-input" id="mahasiswa" required>
                                            <label class="custom-control-label" for="mahasiswa">
                                                <small align="justify">
                                                    Dengan ini saya menyatakan bahwa data yang saya berikan adalah benar
                                                    dan saya memberikan izin untuk penggunaan data tersebut sesuai
                                                    dengan kebijakan privasi yang berlaku.
                                                </small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>
                                </form>

                                <hr>

                                <div class="mt-4 text-center">
                                    <a href="<?php echo base_url('lupapw');?>" class="text-muted"><i
                                            class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                    <p class="mt-3 mb-0 text-center">have an account ? <a
                                            href="<?php echo base_url('login');?>"
                                            class="font-weight-medium text-primary">Login now </a> </p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>©
                                <script>
                                document.write(new Date().getFullYear())
                                </script> Apins Digital. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Aqid Fahri Hafin
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dosenSwitch = document.getElementById('dosenSwitch');
        const mahasiswaSwitch = document.getElementById('mahasiswaSwitch');
        const regDosenForm = document.getElementById('regDosenForm');
        const regMahasiswaForm = document.getElementById('regMahasiswaForm');

        dosenSwitch.addEventListener('change', function() {
            if (dosenSwitch.checked) {
                mahasiswaSwitch.checked =
                    false; // Matikan switch mahasiswa jika switch dosen diaktifkan
                regDosenForm.style.display = 'block';
                regMahasiswaForm.style.display = 'none';
            } else {
                regDosenForm.style.display = 'none';
            }
        });

        mahasiswaSwitch.addEventListener('change', function() {
            if (mahasiswaSwitch.checked) {
                dosenSwitch.checked = false; // Matikan switch dosen jika switch mahasiswa diaktifkan
                regMahasiswaForm.style.display = 'block';
                regDosenForm.style.display = 'none';
            } else {
                regMahasiswaForm.style.display = 'none';
            }
        });
    });
    </script>

    <script src="<?php echo base_url('public/assets/');?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url('public/assets/');?>libs/node-waves/waves.min.js"></script>

    <script src="<?php echo base_url('public/assets/');?>js/app.js"></script>
</body>
<?php endforeach; ?>

</html>
