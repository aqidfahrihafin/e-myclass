 <div class="modal fade addmahasiswa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add <?php echo $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="custom-validation" action="<?php echo site_url('admin/mahasiswa/simpan'); ?>" method="post">
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" class="form-control" id="nik" name="nik" required="">
							</div>
							<div class="form-group">
								<label for="no_kk">Nomor KK</label>
								<input type="number" class="form-control" id="no_kk" name="no_kk" required="">
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control" id="nim" name="nim" required="">
							</div>
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama" name="nama_mahasiswa"  required="">
							</div>
							<div class="form-group">
								<label class="control-label">Angkatan</label>
								<select class="form-control" name="tahun_ajaran_id">
									<?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
										foreach ($tahunajaran as $tahun) {?>
										<option value="<?php echo $tahun->tahun_ajaran_id; ?>"><?php echo $tahun->nama_tahun; ?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Prodi</label>
								<select class="form-control" name="prodi_id" >
									<?php $no = 1; foreach ($prodi as $result) {?>		
										<option value="<?php echo $result->prodi_id; ?>"><?php echo $result->nama_prodi; ?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" >
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<!-- Kolom 2 -->
							<div class="form-group">
								<label for="ttl">Tempat Lahir</label>
								<input type="text" class="form-control" id="ttl" name="tempat_lahir"  required="">
							</div>
							<div class="form-group">
								<label for="tgl">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tgl" name="tanggal_lahir"  required="">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email"  required="">
							</div>
							<div class="form-group">
								<label for="telp_mahasiswa">Telp/WA</label>
								<input type="telp_mahasiswa" class="form-control" id="telp_mahasiswa" name="telp_mahasiswa"  required="">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control" name="alamat_mahasiswa" id="alamat"></textarea>
							</div>
							<div class="form-group">
								<label for="tgl_masuk">Tanggal Registrasi</label>
								<input type="text" class="form-control" id="tgl_masuk" value="akan terisi otomatis" required="" readonly>
							</div>
							<div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
								<i class="mdi mdi-bullseye-arrow"></i>
								<b>Perhatian !</b> pastikan anda memasukkan data dengan benar.
							</div>
						</div>
					</div>                
                  </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
