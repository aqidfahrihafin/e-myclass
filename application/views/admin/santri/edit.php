<?php foreach ($santri as $result) { ?>
    <div class="modal fade editsantri<?php echo $result->santri_id ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">
						 <a  target="_blank" href="<?php echo site_url('admin/santri/formulir/'.$result->santri_id); ?>" class="btn btn-danger btn-sm waves-effect btn-label waves-light">
							<i class="bx bx-printer label-icon"></i> Cetak Formulir
						 </a>
					</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
                        <i class="mdi mdi-bullseye-arrow"></i>
                        <b>Update !</b> data santri,  pastikan anda memasukkan data dengan benar.
                    </div>
                    <form class="custom-validation" action="<?php echo site_url('admin/santri/update'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Data Santri -->
                                <div class="form-group">
                                    <label for="no_induk">No Induk</label>
                                    <input type="hidden" class="form-control" id="santri_id" name="santri_id" value="<?php echo $result->santri_id; ?>" required="">
                                    <input type="hidden" class="form-control" id="status" name="status" value="<?php echo $result->status_santri; ?>" required="">
                                    <input type="text" class="form-control" id="no_induk" name="no_induk" value="<?php echo $result->no_induk; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $result->nik; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="no_kk">Nomor KK</label>
                                    <input type="number" class="form-control" id="no_kk" name="no_kk" value="<?php echo $result->no_kk; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama_santri" value="<?php echo $result->nama_santri; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" >
                                        <option value="L" <?php echo ($result->jenis_kelamin == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                        <option value="P" <?php echo ($result->jenis_kelamin == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>
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
                                    <label for="telp_santri">Telp Santri</label>
                                    <input type="telp_santri" class="form-control" id="telp_santri" name="telp_santri" value="<?php echo $result->telp_santri; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" name="alamat_santri" id="alamat"><?php echo $result->alamat_santri; ?></textarea>
                                </div>
                                <label for=""> <span class="badge badge-pill badge-success font-size-8">Data Registrasi Santri</span></label>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tgl_masuk" name="tanggal_masuk" value="<?php echo $result->tanggal_masuk; ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Kolom 2 -->
                                <div class="form-group">
                                    <label class="control-label">Sanah Dirasah</label>
                                    <select class="form-control" name="tahun_ajaran_id">
                                        <?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
                                            foreach ($tahunajaran as $tahun) {?>
                                            <option value="<?php echo $tahun->tahun_ajaran_id; ?>" <?php echo ($result->tahun_ajaran_id == $tahun->tahun_ajaran_id) ? 'selected' : ''; ?>><?php echo $tahun->nama_tahun; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <label for=""> <span class="badge badge-pill badge-primary font-size-8">Data Ayah</span></label>
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $result->nama_ayah; ?>" required="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Pendidikan</label>
                                    <select class="form-control" name="pendidikan_ayah" required="">
                                        <option value="SD Sedrajat" <?php echo ($result->pendidikan_ayah == 'SD Sedrajat') ? 'selected' : ''; ?>>SD Sedrajat</option>
                                        <option value="SMP Sedrajat" <?php echo ($result->pendidikan_ayah == 'SMP Sedrajat') ? 'selected' : ''; ?>>SMP Sedrajat</option>
                                        <option value="SMA Sedrajat" <?php echo ($result->pendidikan_ayah == 'SMA Sedrajat') ? 'selected' : ''; ?>>SMA Sedrajat</option>
                                        <option value="Sarjana (S1)" <?php echo ($result->pendidikan_ayah == 'Sarjana (S1)') ? 'selected' : ''; ?>>Sarjana (S1)</option>
                                        <option value="D1" <?php echo ($result->pendidikan_ayah == 'D1') ? 'selected' : ''; ?>>D1</option>
                                        <option value="Sarjana (S2)" <?php echo ($result->pendidikan_ayah == 'Sarjana (S2)') ? 'selected' : ''; ?>>Sarjana (S2)</option>
                                        <option value="D2" <?php echo ($result->pendidikan_ayah == 'D2') ? 'selected' : ''; ?>>D2</option>
                                    </select>
                                </div>
								<div class="form-group">
									<label class="control-label">Pekerjaan Ayah</label>
									<select class="form-control" name="pekerjaan_ayah" required="">
										<option value="Petani" <?php echo ($result->pekerjaan_ayah == 'Petani') ? 'selected' : ''; ?>>Petani</option>
									</select>
								</div>
								<div class="form-group">
									<label for="telp_ayah">Telp Ayah</label>
									<input type="number" class="form-control" id="telp_ayah" name="telp_ayah" value="<?php echo $result->telp_ayah; ?>" required="">
								</div>    
								<div class="form-group">
									<label for="alamat_ayah">Alamat Ayah</label>
									<textarea class="form-control" name="alamat_ayah" id="alamat_ayah"><?php echo $result->alamat_ayah; ?></textarea>
								</div>

								<label for=""> <span class="badge badge-pill badge-info font-size-8">Data Ibu</span></label>
								<div class="form-group">
									<label for="nama_ibu">Nama Ibu</label>
									<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $result->nama_ibu; ?>" required="">
								</div>            
								<div class="form-group">
									<label class="control-label">Pendidikan Ibu</label>
									<select class="form-control" name="pendidikan_ibu" required="">
										<option value="SD Sedrajat" <?php echo ($result->pendidikan_ibu == 'SD Sedrajat') ? 'selected' : ''; ?>>SD Sedrajat</option>
										<option value="SMP Sedrajat" <?php echo ($result->pendidikan_ibu == 'SMP Sedrajat') ? 'selected' : ''; ?>>SMP Sedrajat</option>
										<option value="SMA Sedrajat" <?php echo ($result->pendidikan_ibu == 'SMA Sedrajat') ? 'selected' : ''; ?>>SMA Sedrajat</option>
										<option value="Sarjana (S1)" <?php echo ($result->pendidikan_ibu == 'Sarjana (S1)') ? 'selected' : ''; ?>>Sarjana (S1)</option>
										<option value="D1" <?php echo ($result->pendidikan_ibu == 'D1') ? 'selected' : ''; ?>>D1</option>
										<option value="Sarjana (S2)" <?php echo ($result->pendidikan_ibu == 'Sarjana (S2)') ? 'selected' : ''; ?>>Sarjana (S2)</option>
										<option value="D2" <?php echo ($result->pendidikan_ibu == 'D2') ? 'selected' : ''; ?>>D2</option>
									</select>
								</div>
								<div class="form-group">
									<label class="control-label">Pekerjaan Ibu</label>
									<select class="form-control" name="pekerjaan_ibu" required="">
										<option value="Petani" <?php echo ($result->pekerjaan_ibu == 'Petani') ? 'selected' : ''; ?>>Petani</option>
									</select>
								</div>
								<div class="form-group">
									<label for="telp_ibu">Telp Ibu</label>
									<input type="number" class="form-control" id="telp_ibu" name="telp_ibu" value="<?php echo $result->telp_ibu; ?>" required="">
								</div>    
								<div class="form-group">
									<label for="alamat_ibu">Alamat Ibu</label>
									<textarea class="form-control" name="alamat_ibu" id="alamat_ibu"><?php echo $result->alamat_ibu; ?></textarea>
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
