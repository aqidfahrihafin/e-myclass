<?php foreach ($mahasiswa as $result) { ?>
    <div class="modal fade editmahasiswa<?php echo $result->mahasiswa_id ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">
						 <a  target="_blank" href="<?php echo site_url('admin/mahasiswa/formulir/'.$result->mahasiswa_id); ?>" class="btn btn-danger btn-sm waves-effect btn-label waves-light">
							<i class="bx bx-printer label-icon"></i> Cetak Formulir
						 </a>
					</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="custom-validation" action="<?php echo site_url('admin/mahasiswa/update'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Data mahasiswa -->                             
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $result->nik; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="no_kk">Nomor KK</label>
                                    <input type="number" class="form-control" id="no_kk" name="no_kk" value="<?php echo $result->no_kk; ?>" required="">
                                </div>
								<div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="hidden" class="form-control" id="mahasiswa_id" name="mahasiswa_id" value="<?php echo $result->mahasiswa_id; ?>" required="">
                                    <input type="hidden" class="form-control" id="status" name="status" value="<?php echo $result->status_mahasiswa; ?>" required="">
                                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $result->nim; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_mahasiswa" value="<?php echo $result->nama_mahasiswa; ?>" required="">
                                </div>						
                                <div class="form-group">
                                    <label class="control-label">Angkatan</label>
                                    <select class="form-control" name="tahun_ajaran_id">
                                        <?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
                                            foreach ($tahunajaran as $tahun) {?>
                                            <option value="<?php echo $tahun->tahun_ajaran_id; ?>" <?php echo ($result->tahun_ajaran_id == $tahun->tahun_ajaran_id) ? 'selected' : ''; ?>><?php echo $tahun->nama_tahun; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
								<div class="form-group">
									<label class="control-label">Prodi</label>
									<select class="form-control" name="prodi_id" required="">
										<option value="">Pilih Prodi</option>
										<?php foreach ($prodi as $prodi_list) {?>
											<option value="<?php echo $prodi_list->prodi_id; ?>" <?php echo ($result->prodi_id == $prodi_list->prodi_id) ? 'selected' : ''; ?>><?php echo $prodi_list->nama_prodi; ?></option>
										<?php }?>
									</select>
								</div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" >
                                        <option value="L" <?php echo ($result->jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="P" <?php echo ($result->jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>                          
                            </div>
                            <div class="col-md-6">
                                <!-- Kolom 2 -->
								<div class="form-group">
                                    <label for="ttl">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="ttl" name="tempat_lahir" value="<?php echo $result->tempat_lahir; ?>" required="">
                                </div>
								<div class="form-group">
                                    <label for="tgl">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl" name="tanggal_lahir" value="<?php echo $result->tanggal_lahir; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $result->email; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="telp_mahasiswa">Telp/WA</label>
                                    <input type="telp_mahasiswa" class="form-control" id="telp_mahasiswa" name="telp_mahasiswa" value="<?php echo $result->telp_mahasiswa; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat_mahasiswa" id="alamat"><?php echo $result->alamat_mahasiswa; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Registrasi</label>
                                    <input type="date" class="form-control" id="tgl_masuk" name="tanggal_masuk" value="<?php echo $result->tanggal_masuk; ?>" readonly required="">
                                </div>
								
								<div class="alert alert-warning alert-dismissible fade show" role="alert" align="justify">
									<i class="mdi mdi-bullseye-arrow"></i>
									<b>Pastikan!</b> anda memasukkan data dengan benar.
								</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
