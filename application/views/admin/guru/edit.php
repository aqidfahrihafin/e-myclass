<?php $no = 1; foreach ($guru as $result) {?>
 <div class="modal fade kelas<?php echo $result['guru_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add <?php echo $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="custom-validation" action="<?php echo site_url('admin/guru/update'); ?>" method="post">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
                            <i class="mdi mdi-bullseye-arrow"></i>
                            <b>Perhatian !</b> pastikan anda memasukkan NIK/NIY dengan benar.
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="hidden" class="form-control" id="guru_id" value="<?php echo $result['guru_id']; ?>" name="guru_id" required="">
                            <input type="text" class="form-control" id="nik" value="<?php echo $result['nik']; ?>" name="nik" required="">
                        </div>
                        <div class="form-group">
                            <label for="niy">NIY</label>
                            <input type="text" class="form-control" id="niy" value="<?php echo $result['niy']; ?>" name="niy" required="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" value="<?php echo $result['nama_guru']; ?>" name="nama_guru"  required="">
                        </div>
                       <div class="form-group">
							<label class="control-label">Jenis Kelamin</label>
							<select class="form-control" name="jenis_kelamin">
								<option value="L" <?php echo ($result['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
								<option value="P" <?php echo ($result['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
							</select>
						</div>
                        <div class="form-group">
                            <label for="ttl">Tempat Lahir</label>
                            <input type="text" class="form-control" id="ttl" value="<?php echo $result['tempat_lahir']; ?>" name="tempat_lahir"  required="">
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl" value="<?php echo $result['tanggal_lahir']; ?>"  name="tanggal_lahir"  required="">
                        </div>
                        <div class="form-group">
							<label class="control-label">Pendidikan</label>
							<select class="form-control" name="pendidikan" required="">
								<option value="SD Sedrajat" <?php echo ($result['pendidikan'] == 'SD Sedrajat') ? 'selected' : ''; ?>>SD Sedrajat</option>
								<option value="SMP Sedrajat" <?php echo ($result['pendidikan'] == 'SMP Sedrajat') ? 'selected' : ''; ?>>SMP Sedrajat</option>
								<option value="SMA Sedrajat" <?php echo ($result['pendidikan'] == 'SMA Sedrajat') ? 'selected' : ''; ?>>SMA Sedrajat</option>
								<option value="Sarjana (S1)" <?php echo ($result['pendidikan'] == 'Sarjana (S1)') ? 'selected' : ''; ?>>Sarjana (S1)</option>
								<option value="D1" <?php echo ($result['pendidikan'] == 'D1') ? 'selected' : ''; ?>>D1</option>
								<option value="Sarjana (S2)" <?php echo ($result['pendidikan'] == 'Sarjana (S2)') ? 'selected' : ''; ?>>Sarjana (S2)</option>
								<option value="D2" <?php echo ($result['pendidikan'] == 'D2') ? 'selected' : ''; ?>>D2</option>
							</select>
						</div>
						 <div class="form-group">
                            <label for="telp">Telp/WA</label>
                            <input type="text" class="form-control" id="telp" value="<?php echo $result['telp_guru']; ?>"  name="telp_guru"  required="">
                      	 </div>
						 <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat_guru"  id="alamat"><?php echo $result['alamat_guru']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select class="form-control" name="status" required="">
                                <option value="aktif">Aktif</option>
                                <option value="non-aktif">Non Aktif</option>
                            </select>
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
<?php }?>
