 <div class="modal fade addsantri" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
					
			     	<div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
						<i class="mdi mdi-bullseye-arrow"></i>
						<b>Perhatian !</b> pastikan anda memasukkan NIK/NO.KK dengan benar.
					</div>
                    <form class="custom-validation" action="<?php echo site_url('admin/santri/simpan'); ?>" method="post">
						<div class="row">
						<div class="col-md-6">
							<label for=""> <span class="badge badge-pill badge-warning font-size-8">Data Santri</span></label>
							<div class="form-group">
								<label for="no_induk">No Induk</label>
								<input type="text" class="form-control" id="no_induk" name="no_induk" required="">
							</div>
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" class="form-control" id="nik" name="nik" required="">
							</div>
							<div class="form-group">
								<label for="no_kk">Nomor KK</label>
								<input type="number" class="form-control" id="no_kk" name="no_kk" required="">
							</div>
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama" name="nama_santri"  required="">
							</div>
							<div class="form-group">
								<label class="control-label">Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" >
									<option value="L">Laki-laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
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
								<label for="telp_santri">Telp Santri</label>
								<input type="telp_santri" class="form-control" id="telp_santri" name="telp_santri"  required="">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control" name="alamat_santri" id="alamat"></textarea>
							</div>
							<label for=""> <span class="badge badge-pill badge-success font-size-8">Data Registrasi Santri</span></label>
							<div class="form-group">
								<label for="tgl_masuk">Tanggal Masuk</label>
								<input type="date" class="form-control" id="tgl_masuk" name="tanggal_masuk"  required="">
							</div>
						</div>
						<div class="col-md-6">
							<!-- Kolom 2 -->
							<div class="form-group">
								<label class="control-label">Sanah Dirasah</label>
								<select class="form-control" name="tahun_ajaran_id">
									<?php usort($tahunajaran, function($a, $b) { return strcmp($b->tahun_ajaran_id, $a->tahun_ajaran_id);});
										foreach ($tahunajaran as $tahun) {?>
										<option value="<?php echo $tahun->tahun_ajaran_id; ?>"><?php echo $tahun->nama_tahun; ?></option>
									<?php }?>
								</select>
							</div>
							<label for=""> <span class="badge badge-pill badge-primary font-size-8">Data Ayah</span></label>
							<div class="form-group">
								<label for="nama_ayah">Nama Ayah</label>
								<input type="text" class="form-control" id="nama_ayah" name="nama_ayah"  required="">
							</div>			
							<div class="form-group">
								<label class="control-label">Pendidikan</label>
								<select class="form-control" name="pendidikan_ayah"  required="">
									<option value="SD Sedrajat">SD Sedrajat</option>
									<option value="SMP Sedrajat">SMP Sedrajat</option>
									<option value="SMA Sedrajat">SMA Sedrajat</option>
									<option value="Sarjana (S1)">Sarjana (S1)</option>
									<option value="D1">D1</option>
									<option value="Sarjana (S2)">Sarjana (S2)</option>
									<option value="D2">D2</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Pekerjaan Ayah</label>
								<select class="form-control" name="pekerjaan_ayah"  required="">
									<option value="Petani">Petani</option>
								</select>
							</div>
							<div class="form-group">
								<label for="telp_ayah">Telp Ayah</label>
								<input type="number" class="form-control" id="telp_ayah" name="telp_ayah"  required="">
							</div>	
							<div class="form-group">
								<label for="alamat_ayah">Alamat Ayah</label>
								<textarea class="form-control" name="alamat_ayah" id="alamat_ayah"></textarea>
							</div>

							<label for=""> <span class="badge badge-pill badge-info font-size-8">Data Ibu</span></label>
							<div class="form-group">
								<label for="nama_ibu">Nama  Ibu</label>
								<input type="text" class="form-control" id="nama_ibu" name="nama_ibu"  required="">
							</div>			
							<div class="form-group">
								<label class="control-label">Pendidikan Ibu</label>
								<select class="form-control" name="pendidikan_ibu"  required="">
									<option value="SD Sedrajat">SD Sedrajat</option>
									<option value="SMP Sedrajat">SMP Sedrajat</option>
									<option value="SMA Sedrajat">SMA Sedrajat</option>
									<option value="Sarjana (S1)">Sarjana (S1)</option>
									<option value="D1">D1</option>
									<option value="Sarjana (S2)">Sarjana (S2)</option>
									<option value="D2">D2</option>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Pekerjaan Ibu</label>
								<select class="form-control" name="pekerjaan_ibu"  required="">
									<option value="Petani">Petani</option>
								</select>
							</div>
							<div class="form-group">
								<label for="telp_ibu">Telp Ibu</label>
								<input type="number" class="form-control" id="telp_ibu" name="telp_ibu"  required="">
							</div>	
							<div class="form-group">
								<label for="alamat_ibu">Alamat Ibu</label>
								<textarea class="form-control" name="alamat_ibu" id="alamat_ibu"></textarea>
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
