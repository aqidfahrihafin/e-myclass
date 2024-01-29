 <div class="modal fade addguru" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
                    <form class="custom-validation" action="<?php echo site_url('admin/guru/simpan'); ?>" method="post">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
                            <i class="mdi mdi-bullseye-arrow"></i>
                            <b>Perhatian !</b> pastikan anda memasukkan NIK/NIY dengan benar.
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required="">
                        </div>
                        <div class="form-group">
                            <label for="niy">NIY</label>
                            <input type="text" class="form-control" id="niy" name="niy" required="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama_guru"  required="">
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
                            <label class="control-label">Pendidikan</label>
                            <select class="form-control" name="pendidikan"  required="">
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
                            <label for="telp">Telp/WA</label>
                            <input type="text" class="form-control" id="telp" name="telp_guru"  required="">
                      	 </div>
						 <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat_guru" id="alamat"></textarea>
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
